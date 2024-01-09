<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;

class FrontWorkerController extends Controller
{
    public function index(){
        $member = Member::where('member_email', Auth::user()->email)->first();
        return view('frontend.worker.index', compact('member'));
    }
}
