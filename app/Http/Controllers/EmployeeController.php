<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function addEmployee(){
        return view('backend.employee.employee.index');
    }

    public function storeEmployee(Request $request){
        Employee::newEmployee($request);
        return back()->with('msg', 'Employee added successfully...!');
    }
}
