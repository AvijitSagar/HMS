<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeDesignation;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function addEmployee(){
        return view('backend.employee.employee.index', [
            'designations' => EmployeeDesignation::all()
        ]);
    }

    public function storeEmployee(Request $request){
        Employee::newEmployee($request);
        return back()->with('msg', 'Employee added successfully...!');
    }

    public function manageEmployee(){
        return view('backend.employee.employee.manage', [
            'employees' => Employee::all()
        ]);
    }

    public function showEmployee(string $id){
        return view('backend.employee.employee.show', [
            'employee' => Employee::find($id)
        ]);
    }

    public function editEmployee(string $id){
        return view('backend.employee.employee.edit', [
            'employee' => Employee::find($id),
            'designations' => EmployeeDesignation::all()
        ]);
    }

    public function updateEmployee(Request $request, string $id){
        Employee::updateEmployee($request, $id);
        return redirect(route('employee.manage'))->with('msg', 'Employee updated successfully...!');
    }

    public function deleteEmployee(string $id){
        Employee::deleteEmployee($id);
        return back()->with('msg', 'Employee deleted successfully...!');
    }
}
