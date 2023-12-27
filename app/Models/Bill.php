<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;

    private static $bill;

    public static function newBill($request){
        self::$bill = new Bill();
        self::$bill->month_year = $request->month_year;
        self::$bill->electric_bill = $request->electric_bill;
        self::$bill->gas_bill = $request->gas_bill;
        self::$bill->water_bill = $request->water_bill;
        self::$bill->internet_bill = $request->internet_bill;
        self::$bill->dish_bill = $request->dish_bill;
        self::$bill->save();
    }

    public static function updateBill($request, $id){
        self::$bill = Bill::find($id);
        self::$bill->month_year = $request->month_year;
        self::$bill->electric_bill = $request->electric_bill;
        self::$bill->gas_bill = $request->gas_bill;
        self::$bill->water_bill = $request->water_bill;
        self::$bill->internet_bill = $request->internet_bill;
        self::$bill->dish_bill = $request->dish_bill;
        self::$bill->save();
    }

    public static function deleteBill($id){
        self::$bill = Bill::find($id);
        self::$bill->delete();
    }
}
