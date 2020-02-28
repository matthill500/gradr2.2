<?php
# @Date:   2019-11-21T07:44:46+00:00
# @Last modified time: 2019-11-28T12:13:18+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionsModule extends Model
{

  public function student(){
    return $this->belongsTo('App\Student');
  }
  public function module(){
    return $this->belongsTo('App\Module');
  }
  public function answer(){
    return $this->hasMany('App\AnswerModule');
  }
  public function vote(){
    return $this->hasMany('App\VotesQuestionsModule');
  }
}
