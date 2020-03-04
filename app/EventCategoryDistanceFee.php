<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategoryDistanceFee extends Model
{
    //
    public function event_cat(){
        return $this->belongsTo('App\EventCategory','event_categories_id','id');

    }    public function category_distance(){
        return $this->belongsTo('App\CategoryDistance','category_distances_id','id');
    }

        public function participant(){
        return $this->belongsTo
        ('App\EventCategoryDistanceFeeParticipant','event_category_distance_fees_id','id')
            ->count();
        }

    public function participants(){
        return $this->hasMany('App\EventCategoryDistanceFeeParticipant',
            'event_category_distance_fees_id','id');
    }

    public function events(){
        return $this->belongsTo('App\Event','event_id','id');
    }


}
