<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function categories(Request $request){
        $categories = Category::all();
        return view('categories',compact('categories'));
    }

    public function questions(Request $request, $category_id){
        $questions = Question::where('category_id', $category_id)->get();
        if (!count($questions)){
            return "No questions for this category";
        }
        return view('questions',compact('questions'));
    }
    public function contactus(Request $request){
        return view('contactus');
    }
}
