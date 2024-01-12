<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentStatus extends Model
{
    use HasFactory;

    private static $paymentStatus;

    public static function newPaymentStatus($request){
        self::$paymentStatus = new PaymentStatus();
        self::$paymentStatus->payment_id = $request->payment_id;
        self::$paymentStatus->month_year = $request->month_year;
        self::$paymentStatus->member_id = $request->member_id;
        self::$paymentStatus->payable_amount = $request->payable_amount;
        self::$paymentStatus->save();
    }
}
