<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\MealRate;
use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class FrontMealController extends Controller
{
    public function index(){
        $member = Member::where('member_email', Auth::user()->email)->first();
        return view('frontend.meal.index', compact('member'));
    }
}
