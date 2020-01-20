<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Psy\Input\CodeArgument;

class EventTodayController extends Controller
{
    //
    public function index(){
            $event = Event::whereDate('date','=',Carbon::now())->get();
        return view('event.event_today.index')->with(compact('event'));
    }
}
