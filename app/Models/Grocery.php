<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grocery extends Model
{
    use HasFactory;

    private static $grocery;
    
    public static function newGrocery($request){
        self::$grocery = new Grocery();
        self::$grocery->grocery_date = $request->grocery_date;
        self::$grocery->grocery_expense = $request->grocery_expense;
        self::$grocery->grocery_description = $request->grocery_description;
        self::$grocery->save();
    }

    public static function updateGrocery($request, $id){
        self::$grocery = Grocery::find($id);
        self::$grocery->grocery_date = $request->grocery_date;
        self::$grocery->grocery_expense = $request->grocery_expense;
        self::$grocery->grocery_description = $request->grocery_description;
        self::$grocery->save();
    }

    public static function deleteGrocery($id){
        self::$grocery = Grocery::find($id);
        self::$grocery->delete();
    }
}
