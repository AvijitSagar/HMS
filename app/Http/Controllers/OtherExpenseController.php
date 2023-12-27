<?php

namespace App\Http\Controllers;

use App\Models\OtherExpense;
use Illuminate\Http\Request;

class OtherExpenseController extends Controller
{
    public function addOtherExpense(){
        return view('backend.expense.other.index');
    }

    public function storeOtherExpense(Request $request){
        OtherExpense::newOtherExpense($request);
        return back()->with('msg', 'Other expense added successfully...!');
    }

    public function manageOtherExpense(){
        $otherExpenses = OtherExpense::all();
        return view('backend.expense.other.manage', compact('otherExpenses'));
    }

    public function showOtherExpense(string $id){
        $otherExpense = OtherExpense::find($id);
        return view('backend.expense.other.show', compact('otherExpense'));
    }

    public function editOtherExpense(string $id){
        $otherExpense = OtherExpense::find($id);
        return view('backend.expense.other.edit', compact('otherExpense'));
    }

    public function updateOtherExpense(Request $request, string $id){
        OtherExpense::updateOtherExpense($request, $id);
        return redirect(route('otherExpense.manage'))->with('msg', 'Other Expense info updated successfully...!');
    }

    public function deleteOtherExpense(string $id){
        OtherExpense::deleteOtherExpense($id);
        return back()->with('msg', 'Other expense deleted successfully...!');
    }
}
