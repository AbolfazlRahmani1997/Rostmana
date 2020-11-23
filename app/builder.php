<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class builder extends Model
{
  protected $fillable=['id'];


  public function gender(){
      return $this->hasOne('App\gender','id','gender_id');
  }
  public function watermode(){
      return $this->hasOne('App\watermode','id','watermode_id');
  }
  public function automode(){
      return $this->hasOne('App\automode','id','automode_id');
  }
}
