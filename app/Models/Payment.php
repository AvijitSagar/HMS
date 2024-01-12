<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // public function member(){
    //     return $this->belongsTo(Member::class);
    // }

    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id');
    }

    public function paymentStatus()
    {
        return $this->hasOne(PaymentStatus::class, 'payment_id');
    }
}
