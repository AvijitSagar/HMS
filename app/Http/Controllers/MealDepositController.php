<?php

namespace App\Http\Controllers;

use App\Models\MealDeposit;
use App\Models\Member;
use Illuminate\Http\Request;

class MealDepositController extends Controller
{
    public function addMealDeposit(){
        return view('backend.member.meal_deposit.index', [
            'members' => Member::all(),
            // get all meal deposit record in descending order
            'mealDeposits' => MealDeposit::orderBy('created_at', 'desc')->get()
        ]);
    }

    public function storeMealDeposit(Request $request){
        MealDeposit::newMealDeposit($request);
        return back()->with('msg', 'Meal deposit added successfully...!');
    }

    public function editMealDeposit(string $id){
        return view('backend.member.meal_deposit.edit', [
            'members' => Member::all(),
            'mealDeposit' => MealDeposit::find($id)
        ]);
    }

    public function updateMealDeposit(Request $request, string $id){
        MealDeposit::updateMealDeposit($request, $id);
        return redirect(route('mealDeposit.add'))->with('msg', 'Meal deposit updated successfully...!');
    }

    public function deleteMealDeposit(string $id){
        MealDeposit::deleteMealDeposit($id);
        return back()->with('msg', 'Meal deposit deleted successfully...!');
    }
}
