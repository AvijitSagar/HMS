<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDesignation;
use Illuminate\Http\Request;

class EmployeeDesignationController extends Controller
{
    public function addDesignation(){
        return view('backend.employee.designation.index', [
            'designations' => EmployeeDesignation::all()
        ]);
    }

    public function storeDesignation(Request $request){

        $this->validate($request,[
            'designation_name'      => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'designation_salary'    => 'required|numeric'
        ],[
            'designation_name.required'     => 'Designation name is required',
            'designation_name.string'       => 'This field can only contain strings',
            'designation_name.regex'        => 'This field can only contain string and spaces',

            'designation_salary.required'   => 'Salary field is required',
            'designation_salary.numeric'    => 'This field only accept integer value'
        ]);
        
        EmployeeDesignation::newDesignation($request);
        return back()->with('msg', 'New designation created successfully...!');
    }

    public function editDesignation(string $id){
        return view('backend.employee.designation.edit', [
            'designation' => EmployeeDesignation::find($id)
        ]);
    }

    public function updateDesignation(Request $request, string $id){

        $this->validate($request,[
            'designation_name'      => 'required|string|regex:/^[a-zA-Z\s]+$/',
            'designation_salary'    => 'required|numeric'
        ],[
            'designation_name.required'     => 'Designation name is required',
            'designation_name.string'       => 'This field can only contain strings',
            'designation_name.regex'        => 'This field can only contain string and spaces',

            'designation_salary.required'   => 'Salary field is required',
            'designation_salary.numeric'    => 'This field only accept integer value'
        ]);
        
        EmployeeDesignation::updateDesignation($request, $id);
        return redirect(route('designation.add'))->with('msg', 'Designation updated successfully...!');
    }

    public function deleteDesignation($id){
        EmployeeDesignation::deleteDesignation($id);
        return back()->with('msg', 'Designation deleted successfully...!');
    }
}
