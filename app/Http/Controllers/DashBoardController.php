<?php

namespace App\Http\Controllers;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashBoardController extends Controller
{
    //
    public function index(){

        $event = Event::whereDate('date','>=',Carbon::now())->get();
        return view('dashboard.index')->with(compact('event'));
    }
}
