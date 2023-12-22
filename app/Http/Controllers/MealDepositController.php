<?php

namespace App\Http\Controllers;

use App\Models\MealDeposit;
use Illuminate\Http\Request;

class MealDepositController extends Controller
{
    public function addMealDeposit(){
        return view('backend.member.meal_deposit.index');
    }
}
