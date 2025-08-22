<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str; // Penting: Import class Str untuk menghasilkan UUID

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    // Jika Anda mengimplementasikan soft deletes untuk tabel 'users', uncomment baris di bawah:
    // use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'role',
        'uuid',       // Jika ini adalah kolom untuk UUID internal
        'user_uuid',  // Jika ini adalah kolom lain untuk UUID internal
        'public_id',  // Tambahkan 'public_id' di sini agar bisa diisi
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Metode "booted" dijalankan setelah model di-boot.
     * Digunakan untuk menghasilkan UUID secara otomatis untuk kolom `public_id`
     * sebelum model disimpan ke database.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function (User $user) {
            // Pastikan kolom public_id diisi dengan UUID baru jika kosong.
            // Kolom ini akan menjadi pengenal unik publik untuk user.
            if (empty($user->public_id)) {
                $user->public_id = (string) Str::uuid();
            }
            // Jika Anda juga ingin mengisi 'uuid' atau 'user_uuid' dengan UUID, Anda bisa tambahkan logika serupa di sini.
            // Contoh:
            // if (empty($user->uuid)) {
            //     $user->uuid = (string) Str::uuid();
            // }
            // if (empty($user->user_uuid)) {
            //     $user->user_uuid = (string) Str::uuid();
            // }
        });
    }


    /**
     * Define the one-to-one relationship: User has one Company.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function company(): HasOne
    {
        return $this->hasOne(Company::class);
    }

    /**
     * Get the transactions for the user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}