<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontSeatController extends Controller
{
    public function index(){
        return view('frontend.seat.index');
    }
}
