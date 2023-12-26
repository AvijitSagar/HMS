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
            'month_year'    => 'required|date_format:Y-m',
            'member_id'     => 'required|unique:meals,member_id,NULL,id,month_year,' . $request->input('month_year'),
            'total_meal'    => 'required|numeric',
        ], [
            'month_year.required'       => 'Please select a month.',
            'month_year.date_format'    => 'Invalid date format. Please select a valid month.',
            'member_id.required'        => 'Please select a member.',
            'member_id.unique'          => 'A meal record already exists for the selected member in the chosen month.',
            'total_meal.required'       => 'Please enter the total number of meals.',
            'total_meal.numeric'        => 'The total number of meals must be a numeric value.',
        ]);

        Meal::newMeal($request);
        return back()->with('msg', 'Meal record for the member successfully added...!');
    }

    public function manageMeal(){
        $meals = Meal::all();
        return view('backend.meal.manage', compact('meals'));
    }

    public function editMeal($id){
        $meal = Meal::find($id);
        $members = Member::all();
        return view('backend.meal.edit', compact('meal', 'members'));
    }

    public function updateMeal(Request $request, string $id){

        $this->validate($request, [
            'month_year'    => 'required|date_format:Y-m',
            'member_id'     => 'required|unique:meals,member_id,' . $id . ',id,month_year,' . $request->input('month_year'),
            'total_meal'    => 'required|numeric',
        ], [
            'month_year.required'       => 'Please select a month.',
            'month_year.date_format'    => 'Invalid date format. Please select a valid month.',
            'member_id.required'        => 'Please select a member.',
            'member_id.unique'          => 'A meal record already exists for the selected member in the chosen month.',
            'total_meal.required'       => 'Please enter the total number of meals.',
            'total_meal.numeric'        => 'The total number of meals must be a numeric value.',
        ]);

        Meal::updateMeal($request, $id);
        return redirect(route('meal.manage'))->with('msg', 'Meal info successfully updated...!');
    }
    
    public function deleteMeal(string $id){
        Meal::deleteMealMeal($id);
        return back()->with('msg', 'Meal record successfully deleted...!');
    }
}
