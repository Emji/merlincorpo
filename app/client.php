<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    public function heure(){
        return $this->belongsTo('App\Heure');
    }

    public function session(){
        
        return $this->belongsTo('App\session');
    }
}
