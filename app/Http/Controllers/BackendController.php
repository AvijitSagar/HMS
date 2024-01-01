<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Employee;
use App\Models\Grocery;
use App\Models\Meal;
use App\Models\Member;
use App\Models\OtherExpense;
use App\Models\Payment;
use App\Models\Room;
use Carbon\Carbon;

class BackendController extends Controller
{
    public static function index(){

        // Get the current date
        $currentDate = Carbon::now();

        // Calculate the first day of the current month
        $firstDayOfCurrentMonth = $currentDate->copy()->startOfMonth();
        // Calculate the last day of the current month
        $lastDayOfCurrentMonth = $currentDate->copy()->endOfMonth();
        // Get the month and year of the current month in the same format as your 'month_year' column
        $currentMonth = $firstDayOfCurrentMonth->format('Y-m');

        // Calculate the first day of the previous month
        $firstDayOfPreviousMonth = $currentDate->copy()->subMonth()->startOfMonth();
        // Calculate the last day of the previous month
        $lastDayOfPreviousMonth = $currentDate->copy()->subMonth()->endOfMonth();
        // Get the month and year of the previous month in the same format as your 'month_year' column
        $previousMonth = $firstDayOfPreviousMonth->format('Y-m');



        $allMembers = Member::all();
        $membersOnLeave = Member::where('status', 0)->get();
        $membersInHostel = Member::where('status', 1)->get();

        $allEmployees = Employee::all();
        $employeesOnLeave = Employee::where('status', 0)->get();
        $employeesInhostel = Employee::where('status', 1)->get();

        $totalRooms = Room::all();
        $bookedRooms = Room::where('status', 0)->get();
        $availableRooms = Room::where('status', 1)->get();

        // Now you can use these values in your Eloquent queries
        $totalMealsCurrentMonth = Meal::where('month_year', $currentMonth)->sum('total_meal');
        $totalMealsPreviousMonth = Meal::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->sum('total_meal');

        // Now you can use these values in your Eloquent queries
        $totalGroceryCurrentMonth = Grocery::whereRaw("STR_TO_DATE(grocery_date, '%d-%m-%Y') BETWEEN ? AND ?", [$firstDayOfCurrentMonth->format('Y-m-d'), $lastDayOfCurrentMonth->format('Y-m-d')])->sum('grocery_expense');
        $totalGroceryPreviousMonth = Grocery::whereRaw("STR_TO_DATE(grocery_date, '%d-%m-%Y') BETWEEN ? AND ?", [$firstDayOfPreviousMonth->format('Y-m-d'), $lastDayOfPreviousMonth->format('Y-m-d')])->sum('grocery_expense');

        // $totalGroceryCurrentMonth = Grocery::where('grocery_date', $firstDayOfCurrentMonth->format('d-m-Y'))->sum('grocery_expense');
        // $totalGroceryPreviousMonth = Grocery::where('grocery_date', $firstDayOfPreviousMonth->format('d-m-Y'))->sum('grocery_expense');

        // $totalBillsPreviousMonth = Bill::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->sum('electric_bill + gas_bill + water_bill + internet_bill + dish_bill');
        // $totalElectricBillPreviousMonth = Bill::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->sum('electric_bill');
        // $totalGasBillPreviousMonth = Bill::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->sum('gas_bill');
        // $totalWaterBillPreviousMonth = Bill::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->sum('water_bill');
        // $totalInternetBillPreviousMonth = Bill::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->sum('internet_bill');
        // $totalDishBillPreviousMonth = Bill::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->sum('dish_bill');
        // $totalOtherExpensePreviousMonth = OtherExpense::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->sum('other_expense_amount');
        // $totalBillsPreviousMonth = $totalElectricBillPreviousMonth + $totalGasBillPreviousMonth + $totalWaterBillPreviousMonth + $totalInternetBillPreviousMonth + $totalDishBillPreviousMonth + $totalOtherExpensePreviousMonth;
        $totalBillsPreviousMonth = Payment::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->value('total_bill');
        $mealRatePreviousMonth = Payment::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->value('meal_rate');
        $totalSeatRentPreviousMonth = Payment::where('month_year', $firstDayOfPreviousMonth->format('Y-m'))->sum('seat_rent');


        
        return view('backend.home.home', compact(
            'allMembers',
            'membersOnLeave',
            'membersInHostel',

            'allEmployees',
            'employeesOnLeave',
            'employeesInhostel',

            'totalRooms',
            'bookedRooms',
            'availableRooms',

            'previousMonth',
            'currentMonth',

            'totalMealsCurrentMonth',
            'totalMealsPreviousMonth',

            'totalGroceryCurrentMonth',
            'totalGroceryPreviousMonth',

            'totalBillsPreviousMonth',

            'mealRatePreviousMonth',

            'totalSeatRentPreviousMonth',
        ));

    }
}
