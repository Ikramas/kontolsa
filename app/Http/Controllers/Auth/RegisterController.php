<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User; // Pastikan model User sudah diimpor
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered; // Penting untuk event pendaftaran user
use Illuminate\Support\Facades\Auth; // Untuk login otomatis setelah register
use Illuminate\Support\Facades\Log; // Untuk logging error

class RegisterController extends Controller
{
    /**
     * Tampilkan formulir pendaftaran akun baru.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // Pastikan view 'auth.register' ada di resources/views/auth/register.blade.php
        return view('auth.register'); 
    }

    /**
     * Tangani permintaan pendaftaran akun baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Untuk debugging: unkomentar baris di bawah untuk melihat semua data request yang masuk
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'membership_type' => ['required', 'string', 'in:ab,alb,um,albt'], // Pastikan opsi ini sesuai dengan HTML Anda
            'mobile' => ['required', 'string', 'max:20', 'unique:users'], // Asumsi kolom 'mobile' ada dan harus unik di tabel 'users'
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed', // Memastikan 'password' cocok dengan 'password_confirmation'
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[`~!@#$%^&*()\-_+\=[\]{}\\|;:\'",<.>\/?])[A-Za-z\d`~!@#$%^&*()\-_+\=[\]{}\\|;:\'",<.>\/?]{8,}$/', // Regex untuk kompleksitas password
            ],
            'g-recaptcha-response' => ['required', 'recaptcha'], // Validasi reCAPTCHA v3. Membutuhkan paket `anhskohbo/no-captcha`.
            'terms' => ['required', 'accepted'], // Validasi checkbox 'terms', memastikan dicentang
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal. Mohon periksa kembali input Anda.',
                'errors' => $validator->errors()
            ], 422); // HTTP 422 Unprocessable Entity
        }

        try {
            // Buat pengguna baru di database
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile, // Simpan nomor handphone
                'membership_type' => $request->membership_type, // Simpan tipe keanggotaan
                'password' => Hash::make($request->password), // Hash password sebelum disimpan
            ]);

            // Memicu event Registered. Berguna untuk fitur seperti verifikasi email.
            event(new Registered($user));

            // Log pengguna masuk secara otomatis setelah pendaftaran
            Auth::login($user);

            // Beri respons sukses dalam format JSON
            return response()->json([
                'success' => true,
                'message' => 'Akun Anda berhasil didaftarkan!',
                'data' => [
                    // Redirect pengguna ke halaman 'companies' setelah berhasil registrasi dan login
                    'redirect' => route('companies') 
                ]
            ]);

        } catch (\Exception $e) {
            // Log error lengkap untuk debugging
            Log::error('User registration failed: ' . $e->getMessage() . ' at ' . $e->getFile() . ':' . $e->getLine());

            // Beri respons error umum dalam format JSON
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server saat pendaftaran. Mohon coba lagi.',
                'errors' => [] // Array kosong untuk error generik
            ], 500); // HTTP 500 Internal Server Error
        }
    }
}