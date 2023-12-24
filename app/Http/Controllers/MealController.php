<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Member;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function addMeal(){
        return view('backend.meal.index', [
            'members' => Member::all(),
            'meals' => Meal::all()
        ]);
    }

    public function storeMeal(Request $request){

        $this->validate($request, [
            'month' => 'required|date_format:d-m-Y', // Updated date format
            'member_id' => 'required|unique:meals,member_id,NULL,id,month,' . $request->input('month'),
            'total_meal' => 'required|numeric',
        ], [
            'month.required' => 'Please select a month.',
            'month.date_format' => 'Invalid date format. Please select a valid month.',
            'member_id.required' => 'Please select a member.',
            'member_id.unique' => 'A meal record already exists for the selected member in the chosen month.',
            'total_meal.required' => 'Please enter the total number of meals.',
            'total_meal.numeric' => 'The total number of meals must be a numeric value.',
        ]);

        Meal::newMeal($request);
        return back()->with('msg', 'Meal record for the member successfully added...!');
    }
}
