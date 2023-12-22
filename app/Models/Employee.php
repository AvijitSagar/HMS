<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    private static $employee, $image, $imageName, $directory;

    public static function imageUpload($request){
        if($request->hasFile('employee_image')){
            self::$image = $request->file('employee_image');
            self::$imageName = self::$image->getClientoriginalName();
            self::$directory = 'uploads/employee-image/';
            self::$image->move(self::$directory, self::$imageName);
            return self::$directory . self::$imageName;
        }else{
            return 'No file uploaded.';
        }
    }

    public static function newEmployee($request){
        self::$employee = new Employee();
        self::$employee->employee_name = $request->employee_name;
        self::$employee->working_area = $request->working_area;
        self::$employee->employee_mobile = $request->employee_mobile;
        self::$employee->employee_voter_id = $request->employee_voter_id;
        self::$employee->employee_address = $request->employee_address;
        self::$employee->employee_image = self::imageUpload($request);
        self::$employee->save();
    }

    public static function updateEmployee($request, $id){
        self::$employee = Employee::find($id);
        self::$employee->employee_name = $request->employee_name;
        self::$employee->working_area = $request->working_area;
        self::$employee->employee_mobile = $request->employee_mobile;
        self::$employee->employee_voter_id = $request->employee_voter_id;
        self::$employee->employee_address = $request->employee_address;
        if($request->file('employee_image')){
            if(file_exists(self::$employee->employee_image)){
                unlink(self::$employee->employee_image);
            }
            self::$employee->employee_image = self::imageUpload($request);
        }
        self::$employee->save();
    }

    public static function deleteEmployee($id){
        self::$employee = Employee::find($id);
        if(file_exists(self::$employee->employee_image)){
            unlink(self::$employee->employee_image);
        }
        self::$employee->delete();
    }
}
