<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'amount',
        'payment_type',
        'payment_status',
        'description',
        'paymentable_id',   
        'paymentable_type', 
        'uuid',             // Jika ada kolom UUID
        'transaction_uuid', // Jika ada kolom UUID
        'company_uuid',     // Jika ada kolom UUID
        'user_uuid',        // Jika ada kolom UUID
    ];

    /**
     * Get the owning paymentable model.
     */
    public function paymentable()
    {
        return $this->morphTo();
    }

    /**
     * Get the user that owns the transaction.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}