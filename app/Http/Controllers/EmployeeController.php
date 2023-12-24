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

        $this->validate($request, [
            'employee_name'             => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'employee_designation_id'   => 'required',
            'employee_mobile'           => 'required|numeric',
            'employee_voter_id'         => 'required|numeric',
            'employee_address'          => 'required',
        'employee_image'                => 'nullable|image|mimes:jpeg,png|max:2048'
        ],[
            'employee_name.required'            => 'Name field is required',
            'employee_name.string'              => 'This field can only contain string',
            'employee_name.regex'               => 'This field can only contain alphabes and spaces',

            'employee_designation_id.required'  => 'Please select employee designation',

            'employee_mobile.required'          => 'Mobile number is required',
            'employee_mobile.numeric'           => 'This field can only contain numbers',

            'employee_voter_id.required'        => 'Mobile number is required',
            'employee_voter_id.numeric'         => 'This field can only contain numbers',

            'employee_address.required'         => 'Address field is required',

            'employee_image.image'              => 'This field can only contain image file',
            'employee_image.mimes'              => 'Image file must be in jpeg, jpg or png format',
            'employee_image.max'                => 'Image file should be in 2048 kb',
        ]);

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

        $this->validate($request, [
            'employee_name'             => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'employee_designation_id'   => 'required',
            'employee_mobile'           => 'required|numeric',
            'employee_voter_id'         => 'required|numeric',
            'employee_address'          => 'required',
        'employee_image'                => 'nullable|image|mimes:jpeg,png|max:2048'
        ],[
            'employee_name.required'            => 'Name field is required',
            'employee_name.string'              => 'This field can only contain string',
            'employee_name.regex'               => 'This field can only contain alphabes and spaces',

            'employee_designation_id.required'  => 'Please select employee designation',

            'employee_mobile.required'          => 'Mobile number is required',
            'employee_mobile.numeric'           => 'This field can only contain numbers',

            'employee_voter_id.required'        => 'Mobile number is required',
            'employee_voter_id.numeric'         => 'This field can only contain numbers',

            'employee_address.required'         => 'Address field is required',

            'employee_image.image'              => 'This field can only contain image file',
            'employee_image.mimes'              => 'Image file must be in jpeg, jpg or png format',
            'employee_image.max'                => 'Image file should be in 2048 kb',
        ]);
        
        Employee::updateEmployee($request, $id);
        return redirect(route('employee.manage'))->with('msg', 'Employee updated successfully...!');
    }

    public function deleteEmployee(string $id){
        Employee::deleteEmployee($id);
        return back()->with('msg', 'Employee deleted successfully...!');
    }
}
