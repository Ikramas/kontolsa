<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Company;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class MemberController extends Controller
{
    /**
     * Menampilkan halaman daftar anggota.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        // Pastikan pengguna terautentikasi sebelum menampilkan halaman
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();

        return view('members', compact('user'));
    }

    /**
     * Mengambil data anggota untuk DataTables.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMembersData(Request $request)
    {
        // Pastikan pengguna terautentikasi
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $loggedInUserId = Auth::id();
        Carbon::setLocale('id'); // Atur locale Carbon untuk format tanggal bahasa Indonesia

        // Ambil data perusahaan yang terkait dengan user yang sedang login
        $members = Company::select([
                                'companies.id',
                                'companies.user_id',
                                'companies.company_name',
                                'companies.membership_expired_date',
                                'companies.membership_status',
                                'companies.national_registration_number',
                                'companies.member_number',
                                'users.name AS user_name'
                            ])
                            ->join('users', 'companies.user_id', '=', 'users.id')
                            ->where('companies.user_id', $loggedInUserId)
                            ->get();

        // Base URLs untuk aksi-aksi terkait anggota
        $certificateBaseUrl = asset('storage/uploads/certificates/');
        $ktaBaseUrl = url('/download/'); // Asumsi ini adalah route untuk download KTA
        $renewalBaseUrl = url('/members/renewal/'); // Asumsi ini adalah route untuk perpanjangan KTA

        return DataTables::of($members)
            ->addIndexColumn() // Menambahkan kolom nomor urut
            ->addColumn('name', function(Company $company) {
                return $company->user_name ?? 'N/A'; // Pastikan nama user tampil
            })
            ->addColumn('expired_date', function(Company $company) {
                // Format tanggal kedaluwarsa ke format bahasa Indonesia
                return $company->membership_expired_date ? Carbon::parse($company->membership_expired_date)->translatedFormat('d F Y') : '-';
            })
            ->addColumn('membership_status', function(Company $company) {
                $status = $company->membership_status ?? 'Tidak ada data';
                $class = '';
                $statusText = $status;

                // Tentukan kelas CSS berdasarkan status keanggotaan
                switch ($status) {
                    case 'Aktif':
                        $class = 'd-inline-block py-6 px-10 bd-ra-6 fs-14 fw-500 lh-16 text-0fa958 bg-0fa958-10'; // Hijau
                        break;
                    case 'Verifikasi Perusahaan':
                        $class = 'd-inline-block py-6 px-10 bd-ra-6 fs-14 fw-500 lh-16 text-f5b40a bg-f5b40a-10'; // Oranye
                        break;
                    case 'Ditolak':
                        $class = 'd-inline-block py-6 px-10 bd-ra-6 fs-14 fw-500 lh-16 text-colorEight bg-colorEight-10'; // Merah
                        break;
                    case 'Belum Mengisi Data':
                        $class = 'd-inline-block py-6 px-10 bd-ra-6 fs-14 fw-500 lh-16 text-para-color bg-colorTwo'; // Abu-abu default
                        break;
                    default:
                        $class = 'd-inline-block py-6 px-10 bd-ra-6 fs-14 fw-500 lh-16 text-secondary bg-ededed'; // Default jika tidak ada yang cocok
                        break;
                }
                return '<span class="' . $class . '">' . $statusText . '</span>';
            })
            ->addColumn('action', function(Company $company) use ($ktaBaseUrl, $renewalBaseUrl, $certificateBaseUrl) {
                // Jika statusnya "Verifikasi Perusahaan", tidak ada aksi yang bisa dilakukan selain informasi
                if ($company->membership_status == 'Verifikasi Perusahaan' || $company->membership_status == 'Belum Mengisi Data') {
                    // Jika Anda ingin menampilkan tombol atau indikator lain untuk status ini, Anda bisa menambahkan di sini.
                    // Untuk saat ini, mengembalikan '-' sesuai permintaan sebelumnya.
                    return '-';
                }

                $dropdownItems = '';

                // Link untuk Lihat KTA
                $ktaIdentifier = $company->national_registration_number ?? $company->member_number ?? $company->id;
                $ktaDownloadUrl = $ktaBaseUrl . $ktaIdentifier;

                if ($company->membership_status == 'Aktif') {
                    $dropdownItems .= '<li><a href="' . $ktaDownloadUrl . '" class="dropdown-item" target="_blank">Lihat KTA</a></li>';
                    // Tambahkan link unduh sertifikat jika status aktif
                    $cleanRegistrationNumber = preg_replace('/[^a-zA-Z0-9_-]/', '', $company->national_registration_number ?? '');
                    $baseCertificateName = !empty($cleanRegistrationNumber) ? $cleanRegistrationNumber : 'default_certificate_' . $company->id;
                    $certificateFileName = $baseCertificateName . '.pdf';
                    $certificateLink = $certificateBaseUrl . $certificateFileName;
                    // Cek apakah file sertifikat ada sebelum menampilkan link download
                    // Ini memerlukan pemeriksaan keberadaan file di storage, yang tidak bisa dilakukan langsung di sini
                    // Anda bisa tambahkan logika di sini atau di JavaScript jika ingin melakukan pengecekan real-time.
                    // Untuk contoh ini, diasumsikan link akan selalu ada atau ditangani di sisi klien/route download.
                    $dropdownItems .= '<li><a href="' . $certificateLink . '" class="dropdown-item" target="_blank">Unduh Sertifikat</a></li>';

                } else {
                    $dropdownItems .= '<li><button class="dropdown-item" disabled>Lihat KTA</button></li>';
                    $dropdownItems .= '<li><button class="dropdown-item" disabled>Unduh Sertifikat</button></li>';
                }


                // Link untuk Perpanjang KTA
                $renewalLink = $renewalBaseUrl . $company->id;
                $dropdownItems .= '<li><a href="' . $renewalLink . '" class="dropdown-item">Perpanjang KTA</a></li>';

                // Tombol Hapus (hanya terlihat oleh admin)
                // Pastikan rute 'members.destroy' ada dan dapat diakses oleh admin
                // Dihapus sementara dari view sesuai komentar di HTML, tetapi disertakan sebagai contoh
                // $dropdownItems .= '<li><button class="dropdown-item text-danger btnDelete" data-href="' . route('members.destroy', $company->id) . '">Hapus</button></li>';

                $htmlActions = '<div class="dropdown d-inline-block">';
                $htmlActions .= '<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">Aksi</button>';
                $htmlActions .= '<ul class="dropdown-menu">';
                $htmlActions .= $dropdownItems;
                $htmlActions .= '</ul>';
                $htmlActions .= '</div>';

                return $htmlActions;
            })
            ->rawColumns(['membership_status', 'action']) // Penting untuk merender HTML di kolom ini
            ->make(true);
    }

    /**
     * Menyimpan anggota baru.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Password::defaults()],
            'company_name' => ['required', 'string', 'max:255'],
        ]);

        if ($validator->fails()) {
            // Mengembalikan error validasi ke klien
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal. Mohon periksa input Anda.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            // Membuat user baru dengan peran 'member'
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'member',
            ]);

            // Membuat entri perusahaan terkait untuk user baru
            // Status awal 'Belum Mengisi Data' menunjukkan user perlu melengkapi profilnya
            Company::create([
                'user_id' => $user->id,
                'membership_type' => 'Belum Ditentukan', // Atau default lain sesuai kebutuhan
                'membership_status' => 'Belum Mengisi Data',
                'company_name' => $request->company_name . ' (Data Perusahaan Belum Lengkap)', // Indikasi status awal
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Anggota berhasil ditambahkan! Mohon informasikan user untuk mengisi data perusahaannya.'
            ]);

        } catch (\Exception $e) {
            // Log error untuk debugging
            Log::error('Gagal menambahkan anggota: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            // Mengembalikan pesan error server ke klien
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server saat menambahkan anggota.',
            ], 500);
        }
    }

    /**
     * Menghapus anggota.
     *
     * @param int $id ID perusahaan (yang akan digunakan untuk menemukan user terkait)
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        // Pastikan hanya admin yang bisa menghapus
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        try {
            $company = Company::find($id);

            if (!$company) {
                return response()->json([
                    'success' => false,
                    'message' => 'Data anggota tidak ditemukan.'
                ], 404);
            }

            // Hapus user terkait jika ada
            if ($company->user) {
                $company->user->delete();
            }

            // Hapus entri perusahaan
            $company->delete();

            return response()->json([
                'success' => true,
                'message' => 'Anggota berhasil dihapus!'
            ]);

        } catch (\Exception $e) {
            Log::error('Gagal menghapus anggota: ' . $e->getMessage() . ' in ' . $e->getFile() . ' on line ' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server saat menghapus anggota.',
            ], 500);
        }
    }
}