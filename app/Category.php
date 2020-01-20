<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function distance(){
        return $this->hasMany('App\CategoryDistance');
    }
}
