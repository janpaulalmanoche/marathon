<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Events;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //Admin
    public function registered()
    {
        $users = User::all();
        return view('admin.register')->with('users',$users);
    }

    public function registeredit(Request $request, $id)
    {
        $users = User::findOrFail($id);
        return view('admin.register-edit')->with('users',$users);
    }
    
    public function registerupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name =$request->input('username');
        $users->usertype =$request->input('usertype');
        $users->update();

        return redirect('/reg-participants')->with('status','Your data is updated');
    }

    public function registerdelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/reg-participants')->with('status','The event has been deleted');
    }

    
    

}

