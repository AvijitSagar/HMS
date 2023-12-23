<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeDesignation extends Model
{
    use HasFactory;

    private static $designation;

    public static function newDesignation($request){
        self::$designation = new EmployeeDesignation();
        self::$designation->designation_name = $request->designation_name;
        self::$designation->designation_salary = $request->designation_salary;
        self::$designation->save();
    }

    public static function updateDesignation($request, $id){
        self::$designation = EmployeeDesignation::find($id);
        self::$designation->designation_name = $request->designation_name;
        self::$designation->designation_salary = $request->designation_salary;
        self::$designation->save();
    }

    public static function deleteDesignation($id){
        self::$designation = EmployeeDesignation::find($id);
        self::$designation->delete();
    }
}
