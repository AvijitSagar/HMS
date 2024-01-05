<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontServiceController extends Controller
{
    public function index(){
        return view('frontend.service.index');
    }
}
