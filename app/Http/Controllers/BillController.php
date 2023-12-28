<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function addBill()
    {
        return view('backend.expense.bill.index');
    }

    public function storeBill(Request $request)
    {

        $this->validate($request, [
            'month_year'    => 'required|date_format:Y-m',
            'electric_bill' => 'required|numeric',
            'gas_bill'      => 'nullable|numeric',
            'water_bill'    => 'nullable|numeric',
            'internet_bill' => 'nullable|numeric',
            'dish_bill'     => 'nullable|numeric'
        ], [
            'month_year.required'       => 'Please select a month of the year',
            'month_year.date_format'    => 'Invalid date format. Please select a valid month.',
            'electric_bill.required'    => 'This field is required',
            'electric_bill.numeric'     => 'This field can contain only numbers',
            'gas_bill.numeric'          => 'This field can contain only numbers',
            'water_bill.numeric'        => 'This field can contain only numbers',
            'internet_bill.numeric'     => 'This field can contain only numbers',
            'dish_bill.numeric'         => 'This field can contain only numbers',
        ]);

        // Check if a record already exists for the given month_year
        $existingBill = Bill::where('month_year', $request->input('month_year'))->first();

        if ($existingBill) {
            return back()->with('error_msg', 'A bill record already exists for the selected month and year');
        }

        Bill::newBill($request);
        return back()->with('msg', 'Bill added successfully...!');
    }

    public function manageBill()
    {
        $bills = Bill::all();
        return view('backend.expense.bill.manage', compact('bills'));
    }

    public function showBill(string $id)
    {
        $bill = Bill::find($id);
        return view('backend.expense.bill.show', compact('bill'));
    }

    public function editBill(string $id)
    {
        $bill = Bill::find($id);
        return view('backend.expense.bill.edit', compact('bill'));
    }

    public function updateBill(Request $request, string $id)
    {
        $this->validate($request, [
            'month_year'    => 'required|date_format:Y-m',
            'electric_bill' => 'required|numeric',
            'gas_bill'      => 'nullable|numeric',
            'water_bill'    => 'nullable|numeric',
            'internet_bill' => 'nullable|numeric',
            'dish_bill'     => 'nullable|numeric'
        ], [
            'month_year.required'       => 'Please select a month of the year',
            'month_year.date_format'    => 'Invalid date format. Please select a valid month.',
            'electric_bill.required'    => 'This field is required',
            'electric_bill.numeric'     => 'This field can contain only numbers',
            'gas_bill.numeric'          => 'This field can contain only numbers',
            'water_bill.numeric'        => 'This field can contain only numbers',
            'internet_bill.numeric'     => 'This field can contain only numbers',
            'dish_bill.numeric'         => 'This field can contain only numbers',
        ]);

        // Check if a record already exists for the given month_year excluding the current record being updated
        $existingBill = Bill::where('month_year', $request->input('month_year'))->where('id', '!=', $id)->first();

        if ($existingBill) {
            return back()->with('error_msg', 'A bill record already exists for the selected month and year');
        }

        Bill::updateBill($request, $id);
        return redirect(route('bill.manage'))->with('msg', 'Bill info updated successfully...!');
    }

    public function deleteBill(string $id)
    {
        Bill::deleteBill($id);
        return back()->with('msg', 'Bills deleted successfully...!');
    }
}
