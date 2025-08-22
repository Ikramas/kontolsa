<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Menampilkan halaman daftar transaksi.
     *
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();

        return view('transactions', compact('user'));
    }

    /**
     * Mengambil data transaksi untuk DataTables, sesuai dengan struktur yang lebih ketat.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTransactionsData(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $loggedInUserId = Auth::id();
        Carbon::setLocale('id');

        // Mengambil transaksi dengan JOIN untuk efisiensi
        $query = Transaction::query()
            ->select([
                'transactions.id',
                'transactions.uuid', // Menggunakan 'uuid' untuk paymentable
                'transactions.user_id',
                'transactions.amount',
                'transactions.payment_type',
                'transactions.status',
                'transactions.created_at',
                'transactions.paymentable_type',
                'transactions.paymentable_id',
                'transactions.transaction_uuid',
                'users.name AS user_name', // PERBAIKAN: Aliaskan users.name menjadi user_name
                'users.email',
                'users.user_uuid AS user_uuid',
                'companies.company_uuid AS company_uuid',
                'companies.company_name',
                'companies.membership_type',
                'companies.membership_classification',
                'companies.company_type',
                'companies.short_name',
                'companies.membership_status AS company_status',
            ])
            ->join('users', 'transactions.user_id', '=', 'users.id')
            ->leftJoin('companies', 'users.id', '=', 'companies.user_id')
            ->with('paymentable');

        // Filter data: hanya tampilkan transaksi milik user yang sedang login
        $query->where('transactions.user_id', $loggedInUserId);

        $transactions = $query->orderBy('transactions.created_at', 'desc');

        return DataTables::of($transactions)
            ->addIndexColumn()
            // Kolom-kolom utama, diambil langsung dari hasil SELECT
            ->addColumn('uuid', function($transaction) {
                return $transaction->uuid ?? null;
            })
            ->addColumn('paymentable_id', function($transaction) {
                return $transaction->paymentable_id ?? null;
            })
            ->addColumn('paymentable_type', function($transaction) {
                return $transaction->paymentable_type ?? null;
            })
            ->addColumn('amount', function($transaction) {
                return (string) $transaction->amount;
            })
            ->addColumn('payment_type', function($transaction) {
                // This part is for the DataTables column, not the modal
                $type = trim($transaction->payment_type ?? 'Baru');
                $class = '';
                if ($type === 'Perpanjang') {
                    $class = 'text-f5b40a bg-f5b40a-10';
                } else {
                    $class = 'text-f5b40a bg-f5b40a-10';
                }
                return '<span class="d-inline-block py-6 px-10 bd-ra-6 fs-14 fw-500 lh-16 ' . $class . '">' . $type . '</span>';
            })
            ->addColumn('upgrade_membership', function() {
                return null;
            })
            ->addColumn('payment_status', function($transaction) {
                // This part is for the DataTables column, not the modal
                $status = trim($transaction->status ?? 'pending');
                $statusText = '';
                $class = '';

                if ($status === 'paid') {
                    $statusText = 'Sukses';
                    $class = 'text-0fa958 bg-0fa958-10';
                } else {
                    $statusText = 'Pending';
                    $class = 'text-f5b40a bg-f5b40a-10';
                }
                return '<span class="d-inline-block py-6 px-10 bd-ra-6 fs-14 fw-500 lh-16 ' . $class . '">' . $statusText . '</span>';
            })
            ->addColumn('reason_reject', function() {
                return null;
            })
            ->editColumn('created_at', function($transaction) {
                return $transaction->created_at ? Carbon::parse($transaction->created_at)->format('d-m-Y H:i:s') : '-';
            })
            ->addColumn('user_uuid', function($transaction) {
                return $transaction->user_uuid ?? null;
            })
            ->addColumn('name', function($transaction) { // Ini adalah kolom 'name' yang asli dari users
                return $transaction->name ?? 'N/A';
            })
            ->addColumn('is_pic', function() {
                return 1; // Mengasumsikan 1
            })
            ->addColumn('user_status', function($transaction) {
                return $transaction->user_status ?? 4; // Mengasumsikan status 4
            })
            ->addColumn('transaction_uuid', function($transaction) {
                return $transaction->transaction_uuid ?? $transaction->id;
            })
            ->addColumn('company_uuid', function($transaction) {
                return $transaction->company_uuid ?? null;
            })
            ->addColumn('company_name', function($transaction) {
                return $transaction->company_name ?? 'N/A';
            })
            ->addColumn('membership_type', function($transaction) {
                return $transaction->membership_type ?? null;
            })
            ->addColumn('classification', function($transaction) {
                return $transaction->classification ?? null;
            })
            ->addColumn('company_type', function($transaction) {
                return $transaction->company_type ?? null;
            })
            ->addColumn('short_name', function($transaction) {
                return $transaction->short_name ?? null;
            })
            ->addColumn('company_status', function($transaction) {
                return $transaction->company_status ?? 4; // Mengasumsikan status 4
            })
            // Tambahkan relasi paymentable sebagai objek bersarang
            ->addColumn('paymentable', function($transaction) {
                return $transaction->paymentable ? $transaction->paymentable->toArray() : null;
            })
            ->addColumn('paymentable_title', function($transaction) {
                return $transaction->paymentable?->title ?? null;
            })
            ->addColumn('paymentable_classification', function($transaction) {
                return $transaction->paymentable?->classification ?? null;
            })
            ->addColumn('action', function($transaction) {
                // Removed the condition to disable the button.
                // It will always be active.
                $printUrl = route('transactions.invoice', ['transaction' => $transaction->transaction_uuid ?? $transaction->id]);

                $htmlActions = '<div class="dropdown d-inline-block">';
                $htmlActions .= '<button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown">Aksi</button>';
                $htmlActions .= '<ul class="dropdown-menu">';
                $htmlActions .= '<li><a href="#" class="dropdown-item btn-show-invoice-modal" data-id="' . $transaction->id . '">Download Receipt</a></li>';
                $htmlActions .= '</ul>';
                $htmlActions .= '</div>';
                
                return $htmlActions;
            })
            ->rawColumns(['payment_type', 'payment_status', 'action'])
            ->make(true);
    }

    /**
     * Menyimpan transaksi baru.
     * Hanya boleh diakses oleh administrator.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return response()->json(['error' => 'Forbidden'], 403);
        }

        $validator = Validator::make($request->all(), [
            'user_id'       => 'required|exists:users,id',
            'amount'        => 'required|numeric|min:0',
            'payment_type'  => 'required|string|in:baru,perpanjang',
            'status'        => 'required|string|in:pending,paid',
            'description'   => 'nullable|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal. Mohon periksa input Anda.',
                'errors'  => $validator->errors()
            ], 422);
        }

        try {
            Transaction::create([
                'user_id'          => $request->user_id,
                'amount'           => $request->amount,
                'payment_type'     => $request->payment_type,
                'status'           => $request->status,
                'description'      => $request->description,
                'transaction_uuid' => Str::uuid(),
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil ditambahkan!'
            ]);

        } catch (\Exception $e) {
            Log::error('Gagal menambahkan transaksi: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server saat menambahkan transaksi.',
            ], 500);
        }
    }

    /**
     * Menangani download atau tampilan invoice.
     *
     * @param \App\Models\Transaction $transaction
     * @return \Illuminate\Http\Response
     */
    public function downloadInvoice(Transaction $transaction)
    {
        if (!Auth::check() || (Auth::user()->role === 'member' && Auth::user()->id !== $transaction->user_id)) {
            abort(403, 'Anda tidak memiliki izin untuk mengunduh faktur ini.');
        }

        Log::info('Percobaan unduh faktur untuk transaksi ID: ' . $transaction->id . ' oleh user_id: ' . Auth::id());
        return response('Unduh faktur untuk transaksi ID: ' . $transaction->id . '. Ini adalah placeholder.', 200)
            ->header('Content-Type', 'text/plain');
    }
}