<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    private static $meal;

    public static function newMeal($request){
        self::$meal = new Meal();
        self::$meal->month_year = $request->month_year;
        self::$meal->member_id = $request->member_id;
        self::$meal->total_meal = $request->total_meal;
        self::$meal->save();
    }
}
