<?php

namespace App\Http\Controllers;

use App\CategoryDistance;
use App\Event;
use App\EventCategory;
use App\EventCategoryDistanceFee;
use App\EventCategoryDistanceFeeParticipant;
use App\Http\Controllers\Auth\VerificationController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Laravel\Ui\UiServiceProvider;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    //

    public function index(){
        $events = Event::whereDate('date' ,'>= ',Carbon::now())->get();
        return view('event.index')->with(compact('events'));
    }

    public function create(){
//            $host =
//        dd('haha');
//        flash('Welcome Aboard!');

        return view('event.create');
    }

    public function store(Request $request){
        if($request->date <= Carbon::now()){
            flash('cant add an event that the date is behind in the current date of now
            or an event for todays date, event must be
             planned ahead of schedule time')->error();
            return redirect()->back();
        }


//        dd($request->all());
        $new = new Event;
        $new->title = $request->event;
        $new->organizer = $request->organizer;
        $new->date = $request->date;
        $new->limit = $request->limit;
        $new->save();
    flash('event saved')->success();
        return redirect(route('event.index'));
    }


    public function show($event_id){
// dd('tst');
        $event = Event::find($event_id);
        $event_categories = EventCategory::where('event_id',$event->id)->first();
//        $event_category = EventCategory::with('category','event_cat_distance'
//        )->where('event_id',$event->id)->get();
//        dd($event_category);

        $event_category = EventCategoryDistanceFee::with('category_distance')
            ->where('event_id',$event->id)->get();
//        dd($event_category);

        return view('event.show')->with(compact('event_category','event'));
    }


    public function event_participant($event_id, $cat_distance_id){
            // dd('test');
        $event_date = Event::find($event_id);
        $count_if_full = EventCategoryDistanceFeeParticipant::where('status','=','paid')->count();
        $result_count = 'not_full';
        if($event_date->limit == $count_if_full){
            $result_count = 'full';
        }

        $now = Carbon::now();


        $event_date =Carbon::parse($event_date->date);

            $set_val = false;
            if($event_date > $now){
               $set_val = true;
            }
            // dd($set_val); 



        $event = Event::find($event_id);

        $cat_distance = CategoryDistance::where('id',$cat_distance_id)->first();
        $participant =  EventCategoryDistanceFeeParticipant::where('event_id',$event_id)
            ->where('status','!=','canceled')
            ->where('category_distances_id',$cat_distance_id)->get();

        $count =  EventCategoryDistanceFeeParticipant::where('event_id',$event_id)
            ->where('category_distances_id',$cat_distance_id)->count();

        $earning =  EventCategoryDistanceFeeParticipant::where('event_id',$event_id)
            ->where('category_distances_id',$cat_distance_id)
            ->where('status','=','paid')->sum('fee');

        $participant_show_up_count =  EventCategoryDistanceFeeParticipant::where('event_id',$event_id)
            ->where('category_distances_id',$cat_distance_id)->where('status','=','paid')->count();


            // return redirect(url('participant-no',))

        return view('event.participant.index')->with(compact('event',
            'participant','cat_distance','count','earning','participant_show_up_count','set_val','result_count'));
    }
     


    public function confirm($id){
//        dd('tet');
        $find = EventCategoryDistanceFeeParticipant::find($id);
        $find->status = 'paid';
        $find->save();
                    

        return redirect(url('participant-no',$find->id));
        // flash('particant confirmed')->success();
        // return redirect()->back();
    }

       //after confirmation of participant
       public function participant_no($event_participant_id){
    $event_cat_dis_fee_par = EventCategoryDistanceFeeParticipant::with('user','event_cat_dis_fee')->where('id',$event_participant_id)->first();
    // dd($event_cat_dis_fee_par); 
        return view('event.participant_no.index')->with(compact('event_cat_dis_fee_par'));
        
    }
    public function confirm_par_number(Request $request){
        // dd($request->all());
        $find = EventCategoryDistanceFeeParticipant::find($request->event_id);
        $find->participant_no = $request->par_no;
        $find->save();
        // dd($find);
    
        // dd($find);
        return redirect(url('event'));

    }


}
