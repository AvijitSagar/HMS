<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use Illuminate\Http\Request;

class GroceryController extends Controller
{
    public function addGrocery(){
        return view('backend.expense.grocery.index');
    }

    public function storeGrocery(Request $request){
        Grocery::newGrocery($request);
        return back()->with('msg', 'Grocery expense record added successsfully...!');
    }

    public function manageGrocery(){
        $groceries = Grocery::all();
        return view('backend.expense.grocery.manage', compact('groceries'));
    }

    public function showGrocery(string $id){
        $grocery = Grocery::find($id);
        return view('backend.expense.grocery.show', compact('grocery'));
    }

    public function editGrocery(string $id){
        $grocery = Grocery::find($id);
        return view('backend.expense.grocery.edit', compact('grocery'));
    }

    public function updateGrocery(Request $request, string $id){
        Grocery::updateGrocery($request, $id);
        return redirect(route('grocery.manage'))->with('msg', 'Grocery expense info updated successfully...!');
    }

    public function deleteGrocery(string $id){
        Grocery::deleteGrocery($id);
        return back()->with('msg', 'Grocery expense info deleted successfully...!');
    }
}
