<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontPaymentController extends Controller
{
    public function index(){
        return view('frontend.payment.index');
    }
}