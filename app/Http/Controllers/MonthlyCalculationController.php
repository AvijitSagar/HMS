<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\PaymentStatus;
use App\Models\Room;
use Illuminate\Http\Request;

class MonthlyCalculationController extends Controller
{
    public function showMonthlyCalculation(){
        // $totalPayment = Payment::where('month_year', 'payable_amount')->sum('payable_amount');
        return view('backend.monthly-calculation.index');
    }

    public function calculateMonthlyCalculation(Request $request){
        // Validate the form data
        $request->validate([
            'month_year' => 'required|date_format:Y-m',
        ]);
    
        // Get the selected month and year from the form
        $selectedMonthYear = $request->input('month_year');
    
        // Calculate total payment for the selected month_year
        $totalPayment = Payment::where('month_year', $selectedMonthYear)->sum('payable_amount');
        $totalBill = Payment::where('month_year', $selectedMonthYear)->first('total_bill');
        $employeeSalary = Payment::where('month_year', $selectedMonthYear)->first('employee_salary');
        $totalRoomRentForTheMonth = Payment::where('month_year', $selectedMonthYear)->sum('seat_rent');
        $totalMealBalance = Payment::where('month_year', $selectedMonthYear)->sum('meal_balance');
    
        // Calculate total room rent
        $totalRoomRent = Room::sum('seat_rent');

        $totalCollectedPayment = PaymentStatus::where('month_year', $selectedMonthYear)->sum('payable_amount');
    
        return view('backend.monthly-calculation.show', compact(
            'totalPayment',
             'totalRoomRent',
             'totalBill',
             'employeeSalary',
             'totalRoomRentForTheMonth',
             'selectedMonthYear',
             'totalCollectedPayment',
             'totalMealBalance'
            ));
    }
}
