<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public static function index(){
        return view('backend.home.home');
    }
}
