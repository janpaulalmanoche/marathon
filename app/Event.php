<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    public function organizer(){
        return $this->belongsTo('App\User');
//        >where('type_id','=',3);
    }
}
