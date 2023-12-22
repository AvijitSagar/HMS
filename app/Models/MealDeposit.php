<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealDeposit extends Model
{
    use HasFactory;

    private static $mealDeposit;

    public static function newMealDeposit($request){
        self::$mealDeposit = new MealDeposit();
        self::$mealDeposit->member_id = $request->member_id;
        self::$mealDeposit->deposit_date = $request->deposit_date;
        self::$mealDeposit->deposit_amount = $request->deposit_amount;
        self::$mealDeposit->save();
    }

    public static function updateMealDeposit($request, $id){
        self::$mealDeposit = MealDeposit::find($id);
        self::$mealDeposit->member_id = $request->member_id;
        self::$mealDeposit->deposit_date = $request->deposit_date;
        self::$mealDeposit->deposit_amount = $request->deposit_amount;
        self::$mealDeposit->save();
    }

    public static function deleteMealDeposit($id){
        self::$mealDeposit = MealDeposit::find($id);
        self::$mealDeposit->delete();
    }


    public function member(){
        return $this->belongsTo(Member::class);
    }
}
