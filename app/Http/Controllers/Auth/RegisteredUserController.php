<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
class RegisteredUserController extends Controller
{
    /**
     * Tampilkan formulir pendaftaran akun baru.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register'); 
    }

    /**
     * Tangani permintaan pendaftaran akun baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'membership_type' => ['required', 'string', 'in:ab,alb,um,albt'],
            'mobile' => ['required', 'string', 'max:20', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[`~!@#$%^&*()\-_+\=[\]{}\\|;:\'",<.>\/?])[A-Za-z\d`~!@#$%^&*()\-_+\=[\]{}\\|;:\'",<.>\/?]{8,}$/',
            ],
            'terms' => ['required', 'accepted'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal. Mohon periksa kembali input Anda.',
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'membership_type' => $request->membership_type,
                'uuid' => (string) Str::uuid(), // Buat UUID saat registrasi
                'user_uuid' => (string) Str::uuid(), // Baris yang diperbaiki
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            // --- PERUBAHAN PENTING DI SINI ---
            // Hapus baris berikut agar pengguna TIDAK otomatis login setelah register:
            // Auth::login($user); 

            return response()->json([
                'success' => true,
                'message' => 'Akun Anda berhasil didaftarkan! Silakan login untuk melanjutkan.', // Pesan lebih jelas
                'data' => [
                    'redirect' => route('login') // ✅ Ubah redirect ke halaman login
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('User registration failed: ' . $e->getMessage() . ' at ' . $e->getFile() . ':' . $e->getLine());
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan server saat pendaftaran. Mohon coba lagi.',
                'errors' => []
            ], 500);
        }
    }
}