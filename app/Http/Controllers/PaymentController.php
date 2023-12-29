<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Meal;
use App\Models\MealRate;
use App\Models\Member;
use App\Models\OtherExpense;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function addPayment(){
        return view('backend.payment.index');
    }

    public function calculatePayment(Request $request){

        // validation
        $this->validate($request, [
            'month_year' => 'required|date_format:Y-m',
        ]);

        $selectedMonthYear = $request->input('month_year');

        // Fetch bills and other expenses for the selected month and year
        $bills = Bill::where('month_year', 'like', "{$selectedMonthYear}%")->first();
        $others = OtherExpense::where('month_year', 'like', "{$selectedMonthYear}%")->first();

        // Check if records are found for the selected month and year
        if (!$bills || !$others) {

            return back()->with('error-msg', 'No records found for the selected month and year');

        }else{

            $members = Member::all();
            $countMembers = count($members);

            // Fetch meal rate for the selected month and year
            $mealRate = MealRate::where('month_year', 'like', "{$selectedMonthYear}%")->first();

            // Fetch member-wise meals for the selected month and year
            $memberWiseMeals = Meal::where('month_year', 'like', "{$selectedMonthYear}%")->get();

            // Calculate the total bill
            $totalBill = ($bills->electric_bill + $bills->gas_bill + $bills->water_bill + $bills->internet_bill + $bills->dish_bill) + ($others->other_expense_amount);

            // Calculate the service charge per member
            $serviceCharge = $totalBill / $countMembers;

            // Check if payment records already exist for the selected month and year
            $existingPayments = Payment::where('month_year', $selectedMonthYear)->get();

            if ($existingPayments->isNotEmpty()) {

                return back()->with('error-msg', 'Payment records already exist for the selected month and year');

            }else{

                // Loop through member-wise meals and create payment records
                foreach ($memberWiseMeals as $memberWiseMeal) {
                    $payableAmount = ($memberWiseMeal->total_meal * $mealRate->meal_rate) + $serviceCharge + $memberWiseMeal->member->seat->room->seat_rent;

                    $payment = new Payment();
                    $payment->month_year = $selectedMonthYear;
                    $payment->member_id = $memberWiseMeal->member_id;
                    $payment->total_meal = $memberWiseMeal->total_meal;
                    $payment->meal_rate = $mealRate->meal_rate;
                    $payment->service_charge = $serviceCharge;
                    $payment->seat_rent = $memberWiseMeal->member->seat->room->seat_rent;
                    $payment->payable_amount = $payableAmount;
                    $payment->save();
                }
                return back()->with('msg', 'Payment records added successfully');

            }

        }
    }
}
