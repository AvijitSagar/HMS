<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $member = Member::where('member_email', Auth::user()->email)->first();
        $amountToPay = Payment::Where('month_year', Carbon::now()->format('F Y'))->first();
        return view('frontend.home.home', compact('member', 'amountToPay'));
    }
}
