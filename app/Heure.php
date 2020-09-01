<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Heure;

class Heure extends Model
{
    public function Client(){

      return  $this->hasMany('App\client','heure_id','id');
    }

    static function IsFull(){

      $heures=Heure::all();
      $HeureTotal = $heures->count();
      $reservation = $heures->where('taken',1)->count();
      if($reservation == $HeureTotal){
      return true;
      }else{
        return false;
      }

    }
}
