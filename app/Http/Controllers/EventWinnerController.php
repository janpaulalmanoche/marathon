<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventCategoryDistanceFeeParticipant;
use App\EventWinner;
//use App\EventWinnner;
use App\Event;
use Carbon\Carbon;
use App\EventCategory;
use App\EventCategoryDistanceFee;
class EventWinnerController extends Controller
{
    //


    public function send($par_id){
        $count = EventCategoryDistanceFeeParticipant::where('participant_no',$par_id)->count();

        $msg = 'THIS NO. IS NOT REGISTERED ON THE EVENT';
        if($count <= 0){

            return response()->json(
                [
                    'success' => true,
                    'data' =>'',
                    'place' => $msg
                ]
            );
        }

        // if exits already
        $count_e = EventWinner::where('participant_no',$par_id)->count();

        $msg = 'already finished the event';
        if($count_e >= 1){

            return response()->json(
                [
                    'success' => true,
                    'data' =>'',
                    'place' => $msg
                ]
            );
        }

        $find = EventCategoryDistanceFeeParticipant::with('event','event_cat_dis_fee','user','distance.category')
            ->where('participant_no',$par_id)->first();

        $place = EventWinner::
            where('category_distances_id',$find->category_distances_id)
            ->where('event_id',$find->event_id)
            ->count();

//        return response($find);
        $store = new EventWinner;
        $store->event_category_distance_fees_id = $find->event_category_distance_fees_id;
        $store->category_distances_id = $find->category_distances_id;
        $store->fee = $find->fee;
        $store->event_id = $find->event_id;
        $store->participant_no = $find->participant_no;
        $store->user_id =  $find->user_id;
        $store->save();

        $total = $place + 1;
        $msg = 'Congratulations! Rank No.'. $total;

        return response()->json([
           'success' => true,
            'data' => $find,
            'place' => $msg
        ]);


    }


//    public function result(){
//
//            $event = EventWinner::with()
//
//        }

        public function event_today(){

            $event = Event::whereDate('date',Carbon::now())->get();
            return response($event);
        }

        public function event_cat($event_id){

                $cat = EventCategoryDistanceFee::with('event_cat','category_distance.category')
                    ->where('event_id',$event_id)->get();

            return response($cat);
        }

        public function event_cat_distance($event_cat_id){
//                $cat = EventCategoryDistanceFee::where('')
        }

        public function get_ranking($e_c_d_f_id){
//            $KK= App\EventWinner::orderBy('id', 'asc')->take(3)->get();
                    $w = EventWinner::with('category_distance_w','user_w')
                        ->where('event_category_distance_fees_id',$e_c_d_f_id)->orderBy('id','asc')->get();

                    return response($w);
        }


}
