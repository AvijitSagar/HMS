<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use App\Models\PaymentStatus;
use Illuminate\Http\Request;

class PaymentStatusController extends Controller
{
    public function addPaymentStatus(){
        $members = Member::all();
        return view('backend.payment.payment-status.index', compact('members'));
    }

    public function getPaymentInfoesByMonthYear(Request $request){
        return response()->json(Payment::with('member')->where('month_year', $request->id)->get());
    }
    public function getPayableAmountByMember(){
        return response()->json(Payment::where('id', $_GET['id'])->get());
    }

    public function storePaymentStatus(Request $request){

        $paymentStatusExists = PaymentStatus::where('payment_id', $request->payment_id)->first();

        if($paymentStatusExists){
            return redirect(route('payment.manage'))->with('error-msg', 'Member already cleared the payment for the month...!');
        }else{
            PaymentStatus::newPaymentStatus($request);
            return redirect(route('payment.manage'))->with('msg', 'Payment collected...!');
        }
        
    }
}
