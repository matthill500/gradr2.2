<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsGeneral extends Model
{

  public function student(){
    return $this->belongsTo('App\Student');
  }

  public function answer(){
    return $this->hasMany('App\AnswerGeneral');
  }
  public function vote(){
    return $this->hasMany('App\VotesQuestionsGeneral');
  }
}
