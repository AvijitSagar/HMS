<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class FrontSeatController extends Controller
{
    public function index(){
        $member = Member::where('member_email', Auth::user()->email)->first();
        return view('frontend.seat.index', compact('member'));
    }
}
