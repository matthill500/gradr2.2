<?php
# @Date:   2019-11-21T07:44:46+00:00
# @Last modified time: 2019-11-28T12:13:18+00:00




namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

  public function student(){
    return $this->belongsTo('App\Student');
  }
  public function answer(){
    return $this->hasMany('App\Answer');
  }
  public function category(){
    return $this->belongsTo('App\Category');
  }
}
