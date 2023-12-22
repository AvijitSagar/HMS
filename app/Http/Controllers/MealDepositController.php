<?php

namespace App\Http\Controllers;

use App\Models\MealDeposit;
use App\Models\Member;
use Illuminate\Http\Request;

class MealDepositController extends Controller
{
    public function addMealDeposit(){
        return view('backend.member.meal_deposit.index', [
            'members' => Member::all()
        ]);
    }

    public function storeMealDeposit(Request $request){
        MealDeposit::newMealDeposit($request);
        return back()->with('msg', 'Meal deposit added successfully...!');
    }
}
