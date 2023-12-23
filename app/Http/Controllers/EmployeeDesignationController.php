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
        EmployeeDesignation::newDesignation($request);
        return back()->with('msg', 'New designation created successfully...!');
    }

    public function editDesignation(string $id){
        return view('backend.employee.designation.edit', [
            'designation' => EmployeeDesignation::find($id)
        ]);
    }

    public function updateDesignation(Request $request, string $id){
        EmployeeDesignation::updateDesignation($request, $id);
        return redirect(route('designation.add'))->with('msg', 'Designation updated successfully...!');
    }

    public function deleteDesignation($id){
        EmployeeDesignation::deleteDesignation($id);
        return back()->with('msg', 'Designation deleted successfully...!');
    }
}
