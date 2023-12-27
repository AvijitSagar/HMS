<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherExpense extends Model
{
    use HasFactory;

    private static $otherExpense;

    public static function newOtherExpense($request){
        self::$otherExpense = new OtherExpense();
        self::$otherExpense->month_year = $request->month_year;
        self::$otherExpense->other_expense_description = $request->other_expense_description;
        self::$otherExpense->other_expense_amount = $request->other_expense_amount;
        self::$otherExpense->save();
    }

    public static function updateOtherExpense($request, $id){
        self::$otherExpense = OtherExpense::find($id);
        self::$otherExpense->month_year = $request->month_year;
        self::$otherExpense->other_expense_description = $request->other_expense_description;
        self::$otherExpense->other_expense_amount = $request->other_expense_amount;
        self::$otherExpense->save();
    }

    public static function deleteOtherExpense($id){
        self::$otherExpense = OtherExpense::find($id);
        self::$otherExpense->delete();
    }
}
