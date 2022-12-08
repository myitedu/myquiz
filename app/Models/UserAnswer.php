<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','question_id','answer_id','category_id'];

    public function question(){
        return $this->belongsTo(Question::class,'question_id');
    }
    public function answers(){
        return $this->hasMany(Answer::class,'question_id','question_id');
    }
}
