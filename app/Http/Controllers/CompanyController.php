<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str; // Tambahkan ini

class CompanyController extends Controller
{
    /**
     * Menampilkan halaman data perusahaan ATAU formulir pendaftaran jika belum ada data.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();
        $company = $user->company;

        if (!$company) {
            return view('companies.register_form', [
                'user' => $user,
            ]);
        }

        return view('companies', [
            'user' => $user,
            'company' => $company,
        ]);
    }

    /**
     * Menyimpan data pendaftaran perusahaan atau memperbarui yang sudah ada.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        // Peta konversi singkatan jenis keanggotaan ke teks lengkap
        $membershipTypeMap = [
            'ab' => 'Anggota Biasa',
            'um' => 'Usaha Mikro',
            'alb' => 'Anggota Luar Biasa',
            'albt' => 'Anggota Luar Biasa Tingkat Pusat',
        ];

        // --- Aturan Validasi Data ---
        $validator = Validator::make($request->all(), [
            'membership_type' => 'required|string|in:ab,um,alb,albt',
            'classification' => 'required|string',
            'duration_qty' => 'required|integer|min:1|max:5',

            // Common PIC fields
            // pic_name tidak perlu divalidasi karena diambil dari data user
            'pic_nik' => 'required|string|max:16|min:16',
            'pic_npwp' => 'required|string|max:20',
            'pic_position' => 'required|string|max:255',
            'pic_address' => 'required|string|max:500',
            'pic_file_ktp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'pic_file_npwp' => 'required|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'pic_file_passport_photo' => 'required|file|mimes:jpg,jpeg,png|max:5120',

            // Fields for Anggota Biasa
            'company_name' => 'nullable|string|max:255',
            'company_type' => 'nullable|string|max:255',
            'company_nib' => 'nullable|string|max:20',
            'sbu' => 'nullable|string|max:255',
            'company_npwp' => 'nullable|string|max:20',
            'company_address' => 'nullable|string|max:500',
            'company_province' => 'nullable|string|max:255',
            'company_city' => 'nullable|string|max:255',
            'company_postal_code' => 'nullable|string|max:5',
            'company_kbli' => 'nullable|string|max:10',
            'company_business_category' => 'nullable|string|max:255',
            'file_nib' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_sk_kemenkumham' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_npwp' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',

            // Fields for Usaha Mikro
            'um_name' => 'nullable|string|max:255',
            'um_address' => 'nullable|string|max:500',
            'um_province' => 'nullable|string|max:255',
            'um_city' => 'nullable|string|max:255',
            'um_postal_code' => 'nullable|string|max:5',
            'um_kbli' => 'nullable|string|max:10',
            'um_business_category' => 'nullable|string|max:255',

            // Fields for Anggota Luar Biasa
            'name_gm_alb' => 'nullable|string|max:255',
            'phone_gm_alb' => 'nullable|string|max:20',
            'alb_name' => 'nullable|string|max:255',
            'short_name' => 'nullable|string|max:50',
            'npwp_alb' => 'nullable|string|max:20',
            'alb_address' => 'nullable|string|max:500',
            'alb_province' => 'nullable|string|max:255',
            'alb_city' => 'nullable|string|max:255',
            'alb_postal_code' => 'nullable|string|max:5',
            'number_of_members' => 'nullable|integer|min:0',
            'name_staff_asosiasi' => 'nullable|string|max:255',
            'phone_staff_asosiasi' => 'nullable|string|max:20',
            'email_staff_asosiasi' => 'nullable|email|max:255',
            'file_npwp_alb' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_surat_permohonan_alb' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_adart' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_akta_pendirian' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_sk_kemenkumham_alb' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_hasil_munas' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_kode_etik' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_logo_alb' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
            'file_sk_pengurus_asosiasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_daftar_dpd' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_daftar_anggota' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',
            'file_kta_ab_asosiasi' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:20480',

            // 'terms' checkbox validation
            'terms' => 'required|accepted',
        ]);

        // Conditional 'required' rules
        $validator->sometimes([
            'company_name', 'company_type', 'company_nib', 'sbu', 'company_npwp', 'company_address',
            'company_province', 'company_city', 'company_postal_code', 'company_kbli', 'company_business_category',
            'file_nib', 'file_sk_kemenkumham', 'file_npwp'
        ], 'required', function ($input) {
            return $input->membership_type == 'ab';
        });

        $validator->sometimes([
            'um_name', 'um_address', 'um_province', 'um_city', 'um_postal_code',
            'um_kbli', 'um_business_category'
        ], 'required', function ($input) {
            return $input->membership_type == 'um';
        });

        $validator->sometimes([
            'name_gm_alb', 'phone_gm_alb', 'alb_name', 'short_name', 'npwp_alb', 'alb_address',
            'alb_province', 'alb_city', 'alb_postal_code', 'number_of_members',
            'name_staff_asosiasi', 'phone_staff_asosiasi', 'email_staff_asosiasi',
            'file_npwp_alb', 'file_surat_permohonan_alb', 'file_adart', 'file_akta_pendirian',
            'file_sk_kemenkumham_alb', 'file_hasil_munas', 'file_kode_etik', 'file_logo_alb',
            'file_sk_pengurus_asosiasi', 'file_daftar_anggota', 'file_kta_ab_asosiasi',
        ], 'required', function ($input) {
            return $input->membership_type == 'alb' || $input->membership_type == 'albt';
        });

        $validator->sometimes('file_daftar_dpd', 'required|file|mimes:jpg,jpeg,png,pdf|max:20480', function ($input) {
            return ($input->membership_type == 'alb' || $input->membership_type == 'albt') && $input->classification !== 'Pusat Tidak Memiliki Cabang';
        });

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal. Mohon periksa kembali input Anda.',
                'errors' => $validator->errors()
            ], 422);
        }

        // --- Proses Upload File ---
        $uploadedFiles = [];
        $fileFields = [
            'pic_file_ktp' => 'pic_ktp_file',
            'pic_file_npwp' => 'pic_npwp_file',
            'pic_file_passport_photo' => 'pic_photo_file',
            'file_nib' => 'company_nib_file',
            'file_sk_kemenkumham' => 'company_sk_kemenkumham_file',
            'file_npwp' => 'company_npwp_file',
            'file_npwp_alb' => 'file_npwp_alb',
            'file_surat_permohonan_alb' => 'file_surat_permohonan_alb',
            'file_adart' => 'file_adart',
            'file_akta_pendirian' => 'file_akta_pendirian',
            'file_sk_kemenkumham_alb' => 'file_sk_kemenkumham_alb',
            'file_hasil_munas' => 'file_hasil_munas',
            'file_kode_etik' => 'file_kode_etik',
            'file_logo_alb' => 'file_logo_alb',
            'file_sk_pengurus_asosiasi' => 'file_sk_pengurus_asosiasi',
            'file_daftar_dpd' => 'file_daftar_dpd',
            'file_daftar_anggota' => 'file_daftar_anggota',
            'file_kta_ab_asosiasi' => 'file_kta_ab_asosiasi',
        ];

        foreach ($fileFields as $requestFieldName => $dbColumnName) {
            if ($request->hasFile($requestFieldName)) {
                $file = $request->file($requestFieldName);
                $fileName = random_int(100000000000000, 999999999999999) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('uploads/companies', $fileName, 'public');
                $uploadedFiles[$dbColumnName] = basename($path);
            }
        }

        // --- Siapkan Data untuk Penyimpanan/Pembaruan Database ---
        try {
            $user = Auth::user();
            
            // Cek apakah data perusahaan sudah ada untuk user ini
            $company = Company::where('user_id', $user->id)->first();
            $dataToSave = [];
            
            // Perbaikan: Buat kedua UUID hanya jika data perusahaan belum ada
            if (!$company) {
                $dataToSave['uuid'] = (string) Str::uuid();
                $dataToSave['company_uuid'] = (string) Str::uuid();
            }

            $dataToSave = array_merge($dataToSave, [
                'user_id' => $user->id,
                'membership_type' => $membershipTypeMap[$request->membership_type] ?? $request->membership_type,
                'membership_classification' => $request->classification,
                'duration_qty' => (int) $request->duration_qty,
                'membership_status' => 'Verifikasi Perusahaan',
            ]);

            // Add PIC fields
            $dataToSave['pic_name'] = $user->name;
            $dataToSave['pic_nik'] = $request->pic_nik;
            $dataToSave['pic_npwp'] = $request->pic_npwp;
            $dataToSave['pic_position'] = $request->pic_position;
            $dataToSave['pic_address'] = $request->pic_address;

            // Handle type-specific data mapping
            if ($request->membership_type == 'ab') {
                $dataToSave['company_name'] = $request->company_name;
                $dataToSave['company_type'] = $request->company_type;
                $dataToSave['company_nib'] = $request->company_nib;
                $dataToSave['company_sbu'] = $request->sbu;
                $dataToSave['company_npwp'] = $request->company_npwp;
                $dataToSave['company_address'] = $request->company_address;
                $dataToSave['company_province'] = $request->company_province;
                $dataToSave['company_city'] = $request->company_city;
                $dataToSave['company_postal_code'] = $request->company_postal_code;
                $dataToSave['company_kbli'] = $request->company_kbli;
                $dataToSave['company_business_category'] = $request->company_business_category;
            } elseif ($request->membership_type == 'um') {
                $dataToSave['company_name'] = $request->um_name;
                $dataToSave['company_address'] = $request->um_address;
                $dataToSave['company_province'] = $request->um_province;
                $dataToSave['company_city'] = $request->um_city;
                $dataToSave['company_postal_code'] = $request->um_postal_code;
                $dataToSave['company_kbli'] = $request->um_kbli;
                $dataToSave['company_business_category'] = $request->um_business_category;
            } elseif ($request->membership_type == 'alb' || $request->membership_type == 'albt') {
                $dataToSave['company_name'] = $request->alb_name;
                $dataToSave['company_short_name'] = $request->short_name;
                $dataToSave['company_npwp'] = $request->npwp_alb;
                $dataToSave['alb_address'] = $request->alb_address;
                $dataToSave['alb_province'] = $request->alb_province;
                $dataToSave['alb_city'] = $request->alb_city;
                $dataToSave['alb_postal_code'] = $request->alb_postal_code;
                $dataToSave['number_of_members'] = (int) $request->number_of_members;
                $dataToSave['name_staff_asosiasi'] = $request->name_staff_asosiasi;
                $dataToSave['phone_staff_asosiasi'] = $request->phone_staff_asosiasi;
                $dataToSave['email_staff_asosiasi'] = $request->email_staff_asosiasi;
                $dataToSave['phone_gm_alb'] = $request->phone_gm_alb;
            }

            $dataToSave = array_merge($dataToSave, $uploadedFiles);

            if ($request->filled('duration_qty')) {
                $dataToSave['membership_expired_date'] = Carbon::now()->addYears((int) $request->duration_qty);
            } else {
                $dataToSave['membership_expired_date'] = null;
            }

            $dataToSave['national_registration_number'] = $dataToSave['national_registration_number'] ?? null;
            $dataToSave['member_number'] = $dataToSave['member_number'] ?? null;

            $company = Company::updateOrCreate(
                ['user_id' => $user->id],
                $dataToSave
            );

            return response()->json([
                'success' => true,
                'message' => 'Data perusahaan berhasil disimpan dan menunggu verifikasi!',
                'data' => [
                    'redirect' => route('companies.index')
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Company data store failed: ' . $e->getMessage() . ' at ' . $e->getFile() . ':' . $e->getLine());

            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server. Mohon coba lagi atau hubungi administrator.',
                'errors' => []
            ], 500);
        }
    }

    /**
     * Fetches cities based on province ID via AJAX.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCities(Request $request)
    {
        $provinceId = $request->query('province_id');
        if (!$provinceId) {
            return response()->json(['success' => false, 'message' => 'ID Provinsi tidak diberikan.'], 400);
        }

        $dummyCities = [
            '11' => [['id' => '1101', 'name' => 'KOTA BANDA ACEH'], ['id' => '1102', 'name' => 'KAB. ACEH BESAR']],
            '12' => [['id' => '1271', 'name' => 'KOTA MEDAN'], ['id' => '1205', 'name' => 'KAB. ASAHAN']],
            '13' => [['id' => '1371', 'name' => 'KOTA PADANG'], ['id' => '1301', 'name' => 'KAB. PESISIR SELATAN']],
            '14' => [['id' => '1471', 'name' => 'KOTA PEKANBARU'], ['id' => '1401', 'name' => 'KAB. KUANTAN SINGINGI']],
            '15' => [['id' => '1571', 'name' => 'KOTA JAMBI'], ['id' => '1501', 'name' => 'KAB. KERINCI']],
            '16' => [['id' => '1671', 'name' => 'KOTA PALEMBANG'], ['id' => '1601', 'name' => 'KAB. OGAN KOMERING ULU']],
            '17' => [['id' => '1771', 'name' => 'KOTA BENGKULU'], ['id' => '1701', 'name' => 'KAB. BENGKULU SELATAN']],
            '18' => [['id' => '1871', 'name' => 'KOTA BANDAR LAMPUNG'], ['id' => '1801', 'name' => 'KAB. LAMPUNG BARAT']],
            '19' => [['id' => '1971', 'name' => 'KOTA PANGKAL PINANG'], ['id' => '1901', 'name' => 'KAB. BANGKA']],
            '21' => [['id' => '2171', 'name' => 'KOTA TANJUNG PINANG'], ['id' => '2101', 'name' => 'KAB. BINTAN']],
            '31' => [['id' => '3171', 'name' => 'KOTA ADM. JAKARTA PUSAT'], ['id' => '3172', 'name' => 'KOTA ADM. JAKARTA UTARA']],
            '32' => [['id' => '3273', 'name' => 'KOTA BANDUNG'], ['id' => '3201', 'name' => 'KAB. BOGOR']],
            '33' => [['id' => '3374', 'name' => 'KOTA SEMARANG'], ['id' => '3301', 'name' => 'KAB. CILACAP']],
            '34' => [['id' => '3471', 'name' => 'KOTA YOGYAKARTA'], ['id' => '3404', 'name' => 'KAB. SLEMAN']],
            '35' => [['id' => '3578', 'name' => 'KOTA SURABAYA'], ['id' => '3501', 'name' => 'KAB. PACITAN']],
            '36' => [['id' => '3671', 'name' => 'KOTA SERANG'], ['id' => '3601', 'name' => 'KAB. PANDEGLANG']],
            '51' => [['id' => '5171', 'name' => 'KOTA DENPASAR'], ['id' => '5101', 'name' => 'KAB. JEMBRANA']],
            '52' => [['id' => '5271', 'name' => 'KOTA MATARAM'], ['id' => '5201', 'name' => 'KAB. LOMBOK BARAT']],
            '53' => [['id' => '5371', 'name' => 'KOTA KUPANG'], ['id' => '5301', 'name' => 'KAB. SUMBA BARAT']],
            '61' => [['id' => '6171', 'name' => 'KOTA PONTIANAK'], ['id' => '6101', 'name' => 'KAB. SAMBAS']],
            '62' => [['id' => '6271', 'name' => 'KOTA PALANGKA RAYA'], ['id' => '6201', 'name' => 'KAB. KOTAWARINGIN BARAT']],
            '63' => [['id' => '6371', 'name' => 'KOTA BANJARMASIN'], ['id' => '6301', 'name' => 'KAB. TANAH LAUT']],
            '64' => [['id' => '6472', 'name' => 'KOTA SAMARINDA'], ['id' => '6401', 'name' => 'KAB. PASER']],
            '65' => [['id' => '6571', 'name' => 'KOTA TARAKAN'], ['id' => '6501', 'name' => 'KAB. MALINAU']],
            '71' => [['id' => '7171', 'name' => 'KOTA MANADO'], ['id' => '7101', 'name' => 'KAB. BOLAANG MONGONDOW']],
            '72' => [['id' => '7271', 'name' => 'KOTA PALU'], ['id' => '7201', 'name' => 'KAB. BANGGAI KEPULAUAN']],
            '73' => [['id' => '7371', 'name' => 'KOTA MAKASSAR'], ['id' => '7301', 'name' => 'KAB. KEPULAUAN SELAYAR']],
            '74' => [['id' => '7471', 'name' => 'KOTA KENDARI'], ['id' => '7401', 'name' => 'KAB. KOLAKA']],
            '75' => [['id' => '7571', 'name' => 'KOTA GORONTALO'], ['id' => '7501', 'name' => 'KAB. GORONTALO']],
            '76' => [['id' => '7671', 'name' => 'KOTA MAMUJU'], ['id' => '7601', 'name' => 'KAB. MAJENE']],
            '81' => [['id' => '8171', 'name' => 'KOTA AMBON'], ['id' => '8101', 'name' => 'KAB. MALUKU TENGAH']],
            '82' => [['id' => '8271', 'name' => 'KOTA TERNATE'], ['id' => '8201', 'name' => 'KAB. HALMAHERA BARAT']],
            '91' => [['id' => '9171', 'name' => 'KOTA JAYAPURA'], ['id' => '9101', 'name' => 'KAB. MERAUKE']],
            '92' => [['id' => '9271', 'name' => 'KOTA SORONG'], ['id' => '9201', 'name' => 'KAB. FAKFAK']],
            '93' => [['id' => '9301', 'name' => 'KAB. MERAUKE'], ['id' => '9302', 'name' => 'KAB. MAPPI']],
            '94' => [['id' => '9401', 'name' => 'KAB. PUNCAK JAYA'], ['id' => '9402', 'name' => 'KAB. JAYAPURA']],
            '95' => [['id' => '9501', 'name' => 'KAB. JAYAPURA'], ['id' => '9502', 'name' => 'KAB. PEGUNUNGAN BINTANG']],
            '96' => [['id' => '9601', 'name' => 'KAB. SORONG'], ['id' => '9602', 'name' => 'KAB. SORONG SELATAN']],
        ];

        $cities = $dummyCities[$provinceId] ?? [];

        if (empty($cities)) {
            return response()->json(['success' => false, 'message' => 'Tidak ada kota ditemukan untuk provinsi ini.'], 404);
        }

        return response()->json(['success' => true, 'data' => $cities]);
    }

    /**
     * Checks NIB via AJAX (placeholder).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function checkNib(Request $request)
    {
        $nib = $request->query('nib');
        if (!$nib) {
            return response()->json(['success' => false, 'message' => 'NIB tidak diberikan.'], 400);
        }

        $dummyNibData = [
            '1234567890123' => [
                'nama' => 'PT. Contoh Bisnis Jaya',
                'skala_usaha' => 'Besar',
            ],
            '9876543210987' => [
                'nama' => 'CV. Makmur Sentosa',
                'skala_usaha' => 'Menengah',
            ],
        ];

        if (isset($dummyNibData[$nib])) {
            return response()->json([
                'success' => true,
                'message' => 'NIB ditemukan.',
                'data' => $dummyNibData[$nib]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'NIB tidak ditemukan atau tidak valid.',
                'data' => []
            ], 404);
        }
    }
}
