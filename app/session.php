<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    public function ClientSession(){

       return  $this->hasMany('App\client','session_id','id');
    }
}
