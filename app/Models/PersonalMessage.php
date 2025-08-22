<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str; // Penting: Import class Str untuk menghasilkan UUID

class PersonalMessage extends Model
{
    use HasFactory;

    // Primary key tetap 'id' dan tetap auto-incrementing, 
    // jadi kita tidak perlu override $incrementing dan $keyType.

    // Kolom yang dapat diisi secara massal, termasuk 'uuid_chat'
    protected $fillable = [
        'uuid_chat', // Tambahkan kolom uuid_chat di sini
        'sender_id',
        'receiver_id',
        'message',
        'is_read',
    ];

    /**
     * Metode "booted" dijalankan setelah model di-boot.
     * Digunakan untuk menghasilkan UUID secara otomatis untuk kolom `uuid_chat` 
     * sebelum model disimpan ke database.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(function (PersonalMessage $message) {
            // Menghasilkan UUID baru dan menetapkannya ke kolom 'uuid_chat'.
            // Ini akan menjadi pengenal unik publik untuk pesan ini.
            if (empty($message->uuid_chat)) {
                $message->uuid_chat = (string) Str::uuid();
            }
        });
    }

    // Relasi dengan model User untuk pengirim pesan
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    // Relasi dengan model User untuk penerima pesan
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}