<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventCategoryDistanceFeeParticipant;
use App\EventWinner;
class EventWinnerController extends Controller
{
    //


    public function send($par_id){

        $find = EventCategoryDistanceFeeParticipant::with('event','event_cat_dis_fee','user','distance.category')->where('participant_no',$par_id)->first();

        $store = new EventWinner;
        $store->event_category_distance_fees_id = $find->event_category_distance_fees_id;
        $store->category_distances_id = $find->category_distances_id;
        $store->fee = $find->fee;
        $store->event_id = $find->event_id;
        $store->participant_no = $find->participant_no;
        $store->user_id =  $find->user_id;
        $store->save();

        return response()->json([
           'success' => true,
            'data' => $find
        ]);


    }


    public function result(){

            $event = EventWinner::with()

        }

}
