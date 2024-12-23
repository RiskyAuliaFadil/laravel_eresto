<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'checkout_id',
        'status',
    ];

    public function checkout()
    {
        return $this->belongsTo(Checkout::class);
    }
}
