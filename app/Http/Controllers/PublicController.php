<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use App\Models\UserAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    protected $user;
    public function __construct(){
        $this->user = Auth::user();
    }
    public function categories(Request $request){
        $categories = Category::all();
        return view('categories',compact('categories'));
    }
    public function questions(Request $request, $category_id){
        $user = Auth::user();
        $method = $request->method();
        if ($method!='POST') {
            $questions = Question::where('category_id', $category_id)->get();
            if (!count($questions)) {
                return "No questions for this category";
            }
            return view('questions',compact('questions'));
        }
        $parms = $request->all();

        unset($parms['_token']);
        unset($parms['category_id']);
        $inputs = [];

        $questions = [];
        $correct_answers = [];

        foreach ($parms as $question_id=>$answer_id){
            $question_id = str_replace("question_","", $question_id);
            $answer = explode(':',$answer_id);
            $question_id = (int) $question_id;
            $answer_id = (int) $answer[0];
            $is_correct = (int) $answer[1];
            $inputs = [
                'user_id' => $user->id,
                'category_id' => $category_id,
                'question_id' => $question_id,
                'answer_id' => $answer_id,
                'is_correct' => $is_correct
            ];
            $questions[$question_id] = $answer_id;
            $correct_answers[$answer_id] = $is_correct;
            $delete = UserAnswer::where('user_id', $user->id)->where('question_id', $question_id)->delete();
            $save = UserAnswer::create($inputs);
        }

        $qids = array_keys($questions);
        $aids = array_values($questions);
        $results = UserAnswer::where('user_id', $user->id)->where('category_id', $category_id)->get();
        return redirect("/thankyou/$category_id");
    }
    public function contactus(Request $request){
        return view('contactus');
    }
    public function thankyou(Request $request, $category_id){
        $user = Auth::user();
        $category_id = (int) $category_id;
        $results = UserAnswer::where('user_id', $user->id)->where('category_id', $category_id)->get();
        return view('thankyou', compact('results'));
    }

}
