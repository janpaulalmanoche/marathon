<?php

namespace App\Http\Controllers\Admin;

use App\Events;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ParticipantsController extends Controller
{   
    public function eventsforparticipants()
    {
//        $events = Events::get();
        return view('admin.participants');
    }

    
}
