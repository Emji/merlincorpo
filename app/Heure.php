<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Heure extends Model
{
    public function Client(){

      return  $this->hasMany('App\client','heure_id','id');
    }
}
