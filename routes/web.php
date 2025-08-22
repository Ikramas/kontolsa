<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ChatController;

// ROOT
Route::get('/', function () {
    if (Auth::check()) {
        return Auth::user()->role === 'admin'
            ? redirect()->route('admin.dashboard')
            : redirect()->route('home');
    }
    return redirect()->route('login');
})->name('root');

// Auth routes (login/register/forgot/etc)
require __DIR__ . '/auth.php';

// DEBUG (sementara) — cek siapa yang login & hasil Gate
Route::get('/debug/whoami', function () {
    $user = Auth::user();
    $inspection = Gate::inspect('access-admin-panel');
    return response()->json([
        'auth'     => Auth::check(),
        'user_id'  => optional($user)->id,
        'email'    => optional($user)->email,
        'role'     => optional($user)->role,
        'gate'     => ['allowed' => $inspection->allowed(), 'message' => (string)($inspection->message() ?? '')],
    ]);
})->middleware(['web','auth']);

// MEMBER (auth web)
Route::middleware(['auth:web'])->group(function () {
    Route::get('/home', [ProfileController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

    Route::prefix('companies')->name('companies.')->group(function () {
        Route::get('/', [CompanyController::class, 'index'])->name('index');
        Route::post('/store', [CompanyController::class, 'store'])->name('store');
        Route::get('/nib-check', [CompanyController::class, 'checkNib'])->name('nib-check');
    });

    Route::prefix('members')->name('members.')->group(function () {
        Route::get('/', [MemberController::class, 'index'])->name('index');
        Route::get('/data', [MemberController::class, 'getMembersData'])->name('data');
        Route::post('/', [MemberController::class, 'store'])->name('store');
        Route::delete('/{member}', [MemberController::class, 'destroy'])->name('destroy')->whereNumber('member');
    });

    Route::prefix('transactions')->name('transactions.')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/data', [TransactionController::class, 'getTransactionsData'])->name('data');
        Route::get('/print/{transaction:transaction_uuid}', [TransactionController::class, 'downloadInvoice'])
            ->name('invoice')->whereUuid('transaction');
    });

    Route::prefix('chat')->group(function () {
        Route::get('/', [ChatController::class, 'index'])->name('chat');
        Route::get('/messages/{userPublicId}', [ChatController::class, 'getPersonalMessages'])->name('chat.messages')->whereAlphaNumeric('userPublicId');
        Route::post('/send', [ChatController::class, 'sendPersonalMessage'])->name('chat.send')->middleware('throttle:30,1');
    });

    Route::view('/settings', 'settings', ['user' => Auth::user()])->name('settings.index');
    Route::view('/guide', 'guide', ['user' => Auth::user()])->name('guide.index');

    Route::get('/cities', [CompanyController::class, 'getCities'])->name('cities');
});

// ADMIN (auth web + can)
Route::middleware(['auth:web', 'can:access-admin-panel'])
    ->prefix('admin')->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    });

// Fallback aman (tanpa view custom)
Route::fallback(function () {
    abort(404);
});
