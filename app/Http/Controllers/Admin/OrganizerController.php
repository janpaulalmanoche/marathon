<?php

namespace App\Http\Controllers\Admin;

use App\categoryevents;
use App\Events;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    public function eventsregistered(){
        
        $events = Events::all();
        return view('admin.org-events-table')->with('events',$events);
    }

    public function eventsregisteredit(Request $request, $id)
    {
        $events = Events::findOrFail($id);
        return view('admin.org-events-edit')->with('events', $events);
    }

    public function eventsregisteredupdate(Request $request, $id)
    {
        $events = Events::find($id);
        $events->nevent = $request->input('nevent');
        $events->norganizer = $request->input('norganizer');
        $events->sedate = $request->input('sedate');
        $events->setime = $request->input('setime');
        $events->update();

        return redirect('/role-org-events-table')->with('status','Your data is updated');
    }

    public function eventsdelete($id)
    {
        $events = Events::findOrFail($id);
        $events->delete();

        return redirect('/role-org-events-table')->with('status','The account has been deleted');
    }
   
    //category
    
}
