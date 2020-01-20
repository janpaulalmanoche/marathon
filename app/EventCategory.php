<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategory extends Model
{
    //
    public function category(){
        return $this->hasMany('App\Category','id','category_id');
    }

    public function event_cat_distance(){
        return $this->hasMany('App\EventCategoryDistanceFee',
            'event_categories_id','id');
    }

    public function event(){
        return $this->belongsTo('App\Event');
    }
}
