<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MealRate extends Model
{
    use HasFactory;

    private static $mealRate;

    public static function newMealRate($request)
    {
        self::$mealRate = new MealRate();
        self::$mealRate->month_year = $request->month_year;
        self::$mealRate->total_meal_of_the_month = $request->total_meal_of_the_month;
        self::$mealRate->total_grocery_of_the_month = $request->total_grocery_of_the_month;
        self::$mealRate->meal_rate = $request->meal_rate;
        self::$mealRate->save();
    }
}
