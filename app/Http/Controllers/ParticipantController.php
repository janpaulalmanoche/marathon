<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategory;
use App\EventCategoryDistanceFee;
use App\EventCategoryDistanceFeeParticipant;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    //

    public function index($event_id){
            $event = Event::find($event_id);

//            $cat_dis_fee_par

        $event_categories = EventCategory::where('event_id',$event->id)->first();

        $event_category = EventCategoryDistanceFee::with('category_distance','events')
            ->where('event_id',$event->id)->get();

//            $count = EventCategoryDistanceFeeParticipant::where('event_category_distance_fees_id',$e)
        return view('participant.index')->with(compact('event','event_category'));
    }

    public function join(Request $request){
//    dd($request->all());

        $event_categories = EventCategory::where('id',$request->event_categories_id)->first();

        $event = Event::where('id',$event_categories->event_id)->first();

        $event_limit = $event->limit;
        $check_paid_participants = EventCategoryDistanceFeeParticipant::where('event_id',$event->id)
            ->where('event_category_distance_fees_id',$request->event_cat_dis_fees_id)
            ->where('reg_type','=','online')
            ->where('status','=','joined')->count();
//        dd($event_limit,$check_paid_participants);
        if($event_limit == $check_paid_participants){

            flash('Online Registration is Full ')->error();
            return redirect()->back();
//            dd('already joined in this category');
        }

        $count = EventCategoryDistanceFeeParticipant::where('event_category_distance_fees_id', $request->event_cat_dis_fees_id)
            ->where('user_id',auth()->user()->id)->count();
        if($count >= 1){

            flash('you already joined in this category')->error();
            return redirect()->back();
//            dd('already joined in this category');
        }



            $check_if_alreadyy_join_one = EventCategoryDistanceFeeParticipant::where('event_id',$event->id)
                ->where('user_id',auth()->user()->id)->count();
            if($check_if_alreadyy_join_one >= 1){

                flash('you already join one category in this event,one category in one event')->error();
                return redirect()->back();
//                dd('you already join one category in this event,one category in one event');
            }


        $new = new EventCategoryDistanceFeeParticipant;
        $new->event_category_distance_fees_id = $request->event_cat_dis_fees_id;
        $new->user_id = auth()->user()->id;
        $new->event_id = $event->id;
        $new->fee = $request->fee;
        $new->category_distances_id = $request->category_distances_id;
        $new->user_id = auth()->user()->id;
        $new->status = 'joined';
        $new->reg_type = 'online';
        $new->save();

        flash('successfully joined the event')->success();
        return redirect(url('participant-join-event'));
    }

    public function active_listing(){

        $event = EventCategoryDistanceFeeParticipant::where('user_id',auth()->user()->id)
        ->where('status','=','joined')->orWhere('status','=','canceled')
            ->orWhere('status','=','paid')->first();
//        dd($event);
        return view('participant.listing')->with(compact('event'));
    }





}
