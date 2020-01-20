<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventCategoryDistanceFeeParticipant extends Model
{
    //

    public function event(){
        return $this->belongsTo('App\Event','event_id','id');
    }
    public function event_cat_dis_fee(){
        return $this->belongsTo('App\EventCategoryDistanceFee','event_category_distance_fees_id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
    public function distance(){
        return $this->belongsTo('App\CategoryDistance','category_distances_id','id');
    }
}
