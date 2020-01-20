<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventCategoryDistanceFeeParticipant;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    //
    public function index(){
        $event = Event::whereDate('date','<=',Carbon::now())->get();
        return view('report.index')->with(compact('event'));
    }
    public function result($event_id){
        $event = Event::find($event_id);

        $participant_sign_up =    $participant = EventCategoryDistanceFeeParticipant::where('event_id',$event_id)->count();
        $participant_present =  EventCategoryDistanceFeeParticipant::
        where('event_id',$event_id)->where('status','=','paid')->count();

        $amount =  EventCategoryDistanceFeeParticipant::
        where('event_id',$event_id)->where('status','=','paid')->sum('fee');

        $participant = EventCategoryDistanceFeeParticipant::where('event_id',$event_id)->get();

        return view('report.result')->with(compact('event','participant',
            'participant_sign_up','participant_present','amount'));
    }

}
