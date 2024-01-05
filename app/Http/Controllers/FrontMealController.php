<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontMealController extends Controller
{
    public function index(){
        return view('frontend.meal.index');
    }
}
