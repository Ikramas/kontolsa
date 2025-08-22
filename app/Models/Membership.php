<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Jika menggunakan soft deletes
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Membership extends Model
{
    use HasFactory, SoftDeletes; // Gunakan SoftDeletes jika 'deleted_at' ada di tabel

    // Nama tabel jika berbeda dari 'memberships'
    // protected $table = 'nama_tabel_memberships_anda';

    protected $fillable = [
        'tenant_id', 'code', 'title', 'slug', 'classification', 'badge', 'price',
        'price_dues', 'duration_type', 'duration', 'order', 'status', 
        'created_by', 'updated_by', 'deleted_by'
    ];

    /**
     * Relasi balik untuk polymorphic (jika Membership bisa memiliki banyak transaksi).
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function transactions(): MorphMany
    {
        return $this->morphMany(Transaction::class, 'paymentable');
    }
}