<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','question_id','answer_id','is_correct','category_id'];
    public function question(){
        return $this->belongsTo(Question::class,'question_id');
    }
    public function answer(){
        return $this->belongsTo(Answer::class,'answer_id');
    }
}
