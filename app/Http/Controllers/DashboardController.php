<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function dashboard(Request $request){
        return view('dashboard.index');
    }

    public function categories(Request $request){
        $parms = $request->all();
        $hide_slidebar = $request->hide_slidebar??0;
        $categories = Category::all();
        return view('dashboard.categories', compact('categories','hide_slidebar'));
    }
}
