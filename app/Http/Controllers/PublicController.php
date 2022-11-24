<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request){
        return view('index');
    }
    public function contactus(Request $request){
        return view('contactus');
    }
}
