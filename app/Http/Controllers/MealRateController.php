<?php

namespace App\Http\Controllers;

use App\Models\Grocery;
use App\Models\Meal;
use App\Models\MealRate;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MealRateController extends Controller
{
    public function addMealRate(){
        return view('backend.meal.meal-rate.index');
    }

    public function calculateMealRate(Request $request){
        // Validate the request
        $this->validate($request, [
            'month_year' => 'required|date_format:Y-m',
        ]);

        $selectedMonthYear = $request->input('month_year');

        // Check if a record already exists for the given month_year
        $existingMealRate = MealRate::where('month_year', $selectedMonthYear)->first();

        if ($existingMealRate) {
            // If a record exists, return a message
            return back()->with('error-msg', 'A meal rate record already exists for the selected month and year.');
        }

        // If no record exists, proceed with the calculations
        $groceries = Grocery::all();
        $memberWiseMeals = Meal::where('month_year', 'like', "{$selectedMonthYear}%")->get();
        $totalMeals = $memberWiseMeals->sum('total_meal');
        $totalGroceryCost = 0;

        foreach ($groceries as $grocery) {
            $groceryDate = Carbon::createFromFormat('d-m-Y', $grocery->grocery_date)->format('Y-m');
            if ($groceryDate === $selectedMonthYear) {
                $totalGroceryCost += $grocery->grocery_expense;
            }
        }

        $mealRate = $totalMeals > 0 ? $totalGroceryCost / $totalMeals : 0;

        // Pass calculated meal rate and other data to the view
        return view('backend.meal.meal-rate.calculate', compact('selectedMonthYear', 'groceries', 'memberWiseMeals', 'totalMeals', 'totalGroceryCost', 'mealRate'));
    }

    public function storeMealRate(Request $request){
        MealRate::newMealRate($request);
        return redirect(route('meal-rate.add'))->with('msg', 'Meal rate record stored successfully...!');
    }

    public function manageMealRate(){
        $mealRates = MealRate::all();
        return view('backend.meal.meal-rate.manage', compact('mealRates'));
    }

    public function showMealRate(string $id){
        $mealRate = MealRate::find($id);
        return view('backend.meal.meal-rate.show', compact('mealRate'));
    }
}
