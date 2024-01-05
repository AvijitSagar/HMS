<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontWorkerController extends Controller
{
    public function index(){
        return view('frontend.worker.index');
    }
}
