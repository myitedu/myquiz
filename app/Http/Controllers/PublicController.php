<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        return view('questions',compact('questions','category_id'));
    }
    public function contactus(Request $request){
        return view('contactus');
    }
    public function user_answer_save(Request $request){
        $user = Auth::user();
        $user_id = $user->id;
        $parms = $request->all();
        $questions = $parms['questions'];
        $category_id = $parms['category_id'];

        $inputs = [];
        foreach ($questions as $question_id => $answer_id){
            $inputs = [
                'category_id' => $category_id,
                'question_id' => $question_id,
                'answer_id' => $answer_id,
                'user_id' => $user_id
            ];
            $del = UserAnswer::where('user_id',$user_id)->where('category_id', $category_id)->where('question_id', $question_id)->delete();
            $new = UserAnswer::create($inputs);
        }
        return redirect("/thankyou/$category_id");
    }
    public function thankyou(Request $request, $category_id){
        $user = Auth::user();
        $answers = UserAnswer::where('category_id', $category_id)->where('user_id', $user->id)->get();
        if (!count($answers)){
            return redirect(route('categories'));
        }
        return view('thankyou',compact('answers'));
    }
}
