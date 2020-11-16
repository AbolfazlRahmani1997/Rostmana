<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable=['avatar','phonenumber'];

    public function User(){
        return $this->belongsTo('App\User');
    }
}
