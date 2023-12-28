<?php

namespace App\Http\Controllers;

use App\Models\OtherExpense;
use Illuminate\Http\Request;

class OtherExpenseController extends Controller
{
    public function addOtherExpense()
    {
        return view('backend.expense.other.index');
    }

    public function storeOtherExpense(Request $request)
    {

        $this->validate($request, [
            'month_year'                => 'required|date_format:Y-m',
            'other_expense_description' => 'required',
            'other_expense_amount'      => 'required|numeric',
        ], [
            'month_year.required'                   => 'this is required',
            'other_expense_description.required'    => 'Description field is required',
            'other_expense_amount.required'         => 'this is required',
            'other_expense_amount.numeric'          => 'numbers only',
            'other_expense_amount.unique'           => 'alredy exists'
        ]);

        $existingOtherExpense = OtherExpense::where('month_year', $request->input('month_year'))->first();

        if($existingOtherExpense){
            return back()->with('error_msg', 'A other expense record already exists for the selected month and year');
        }

        OtherExpense::newOtherExpense($request);
        return back()->with('msg', 'Other expense added successfully...!');
    }

    public function manageOtherExpense()
    {
        $otherExpenses = OtherExpense::all();
        return view('backend.expense.other.manage', compact('otherExpenses'));
    }

    public function showOtherExpense(string $id)
    {
        $otherExpense = OtherExpense::find($id);
        return view('backend.expense.other.show', compact('otherExpense'));
    }

    public function editOtherExpense(string $id)
    {
        $otherExpense = OtherExpense::find($id);
        return view('backend.expense.other.edit', compact('otherExpense'));
    }

    public function updateOtherExpense(Request $request, string $id)
    {

        $this->validate($request, [
            'month_year'                => 'required|date_format:Y-m',
            'other_expense_description' => 'required',
            'other_expense_amount'      => 'required|numeric',
        ], [
            'month_year.required'                   => 'This is required',
            'month_year.date_format'                => 'Invalid date format. Please select a valid month.',
            'other_expense_description.required'    => 'Description field is required',
            'other_expense_amount.required'         => 'This is required',
            'other_expense_amount.numeric'          => 'Numbers only',
        ]);
    
        // Check if a record already exists for the given month_year excluding the current record being updated
        $existingOtherExpense = OtherExpense::where('month_year', $request->input('month_year'))->where('id', '!=', $id)->first();
    
        if ($existingOtherExpense) {
            return back()->with('error_msg', 'Another expense record already exists for the selected month and year');
        }
    
        // Debugging statement
        // dd($request->all());

        OtherExpense::updateOtherExpense($request, $id);
        return redirect(route('otherExpense.manage'))->with('msg', 'Other Expense info updated successfully...!');
    }

    public function deleteOtherExpense(string $id)
    {
        OtherExpense::deleteOtherExpense($id);
        return back()->with('msg', 'Other expense deleted successfully...!');
    }
}
