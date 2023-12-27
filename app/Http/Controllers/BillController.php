<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function addBill(){
        return view('backend.expense.bill.index');
    }

    public function storeBill(Request $request){
        Bill::newBill($request);
        return back()->with('msg', 'Bill added successfully...!');
    }

    public function manageBill(){
        $bills = Bill::all();
        return view('backend.expense.bill.manage', compact('bills'));
    }

    public function showBill(string $id){
        $bill = Bill::find($id);
        return view('backend.expense.bill.show', compact('bill'));
    }

    public function editBill(string $id){
        $bill = Bill::find($id);
        return view('backend.expense.bill.edit', compact('bill'));
    }

    public function updateBill(Request $request, string $id){
        Bill::updateBill($request, $id);
        return redirect(route('bill.manage'))->with('msg', 'Bill info updated successfully...!');
    }

    public function deleteBill(string $id){
        Bill::deleteBill($id);
        return back()->with('msg', 'Bills deleted successfully...!');
    }
}
