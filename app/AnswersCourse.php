<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnswersCourse extends Model
{
  public function student(){
    return $this->belongsTo('App\Student');
  }
  public function question(){
    return $this->belongsTo('App\questionsCourse');
  }
}
