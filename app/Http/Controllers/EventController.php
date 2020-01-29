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
        $new->save();
    flash('event saved')->success();
        return redirect(route('event.index'));
    }


    public function show($event_id){

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

        $event = Event::find($event_id);

        $cat_distance = CategoryDistance::where('id',$cat_distance_id)->first();
        $participant =  EventCategoryDistanceFeeParticipant::where('event_id',$event_id)
            ->where('category_distances_id',$cat_distance_id)->get();

        $count =  EventCategoryDistanceFeeParticipant::where('event_id',$event_id)
            ->where('category_distances_id',$cat_distance_id)->count();

        $earning =  EventCategoryDistanceFeeParticipant::where('event_id',$event_id)
            ->where('category_distances_id',$cat_distance_id)
            ->where('status','=','paid')->sum('fee');

        $participant_show_up_count =  EventCategoryDistanceFeeParticipant::where('event_id',$event_id)
            ->where('category_distances_id',$cat_distance_id)->where('status','=','paid')->count();

        return view('event.participant.index')->with(compact('event',
            'participant','cat_distance','count','earning','participant_show_up_count'));
    }

    public function confirm($id){
//        dd('tet');
        $find = EventCategoryDistanceFeeParticipant::find($id);
        $find->status = 'paid';
        $find->save();

        flash('particant confirmed')->success();
        return redirect()->back();
    }

}
