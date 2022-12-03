<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{

    public $USERID;

    public function __construct(){
        $this->USERID = env('USERID',88);
    }

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

    public function user_answer_save(Request $request){
        $user_id = $this->USERID;
        $parms = $request->all();
        $questions = $parms['questions'];

        $inputs = [];
        foreach ($questions as $question_id => $answer_id){
            $inputs = [
                'question_id' => $question_id,
                'answer_id' => $answer_id,
                'user_id' => $user_id
            ];
            $new = UserAnswer::create($inputs);
        }
        return "User Answers are saved";
    }
}
