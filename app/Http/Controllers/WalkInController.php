<?php

namespace App\Http\Controllers;

use App\CategoryDistance;
use App\Event;
use App\EventCategory;
use App\EventCategoryDistanceFee;
use App\EventCategoryDistanceFeeParticipant;
use App\User;
use Illuminate\Http\Request;

use Carbon\Carbon;

class WalkInController extends Controller
{
    //
    public function index(){

        $event = Event::whereDate('date','>=',Carbon::now())->get();
        return view('walk_in.index')->with(compact('event'));
    }

    public function show($event_id){
        $event = Event::find($event_id);

        $user = User::where('type_id',2)->get();
        $event_categories = EventCategory::where('event_id',$event->id)->first();

        $event_category = EventCategoryDistanceFee::with('category_distance')
            ->where('event_id',$event->id)->get();
        return view('walk_in.details')->with(compact('event','event_category','user'));
    }

    public function select(Request $request){
    //    dd($request->all());
        $event = Event::find($request->event_id);
        $cat_event_dis_fee = EventCategoryDistanceFee::find($request->event_cat_dis_fees_id);
        $cat_distance = CategoryDistance::find($request->category_distances_id);
        $event_cat = EventCategory::find($request->event_categories_id);

        // return redirect(url('participant-no',));


        $user = User::where('type_id',2)->get();
        return view('walk_in.select')->with(compact('event','cat_event_dis_fee','cat_distance'
            ,'event_cat','user'));
    }
    public function save(Request $request){
    //    dd($request->all());

        $count = EventCategoryDistanceFeeParticipant::where('event_category_distance_fees_id',
            $request->cat_event_dis_fee_id)
            ->where('user_id',$request->user_id)->count();
        if($count >= 1){

            flash('particant already registered')->error();
            return redirect()->back();
//            dd('participant already registered');
        }


        $check_if_alreadyy_join_one = EventCategoryDistanceFeeParticipant::where('event_id',$request->event_id)
            ->where('user_id',$request->user_id)->count();
        if($check_if_alreadyy_join_one >= 1){
            flash('only one category in one event')->error();
            return redirect()->back();
//            dd('only one category in one event');
        }



        $new= new EventCategoryDistanceFeeParticipant;
        $new->event_category_distance_fees_id = $request->cat_event_dis_fee_id;
        $new->category_distances_id = $request->cat_distance_id;
        $new->fee = $request->fee;
        $new->event_id = $request->event_id;
        $new->user_id = $request->user_id;
        $new->status = 'paid';
        $new->reg_type = 'walk_in';
        $new->save();

        return redirect(url('/participant-no',$new->id));
        // return redirect(url('/event'));
    }

}
