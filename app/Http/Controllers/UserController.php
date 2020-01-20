<?php

namespace App\Http\Controllers;

use App\Role;
use App\Type;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    //
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(Request $data){
//        dd($data->all());
        $new = new User;
        $new->first_name= $data->first_name;
        $new->middle_name = $data->middle_name;
        $new->last_name = $data->last_name;
        $new->email = $data->email;
        $new->password = Hash::make($data->password);
        $new->gender = $data->gender;
        $new->role_id = 2;
        $new->type_id = 2;
        $new->save();

        return redirect(url('login'));
    }

    public function system_user(){

        $users = $this->user->where('type_id',1)->get();
        return view('user.index')->with(compact('users'));
    }

    public function organizer(){

        $users = $this->user->where('type_id',3)->get();
        return view('user.index')->with(compact('users'));
    }

    public function participant(){

        $users = $this->user->where('type_id',2)->get();
        return view('user.index')->with(compact('users'));
    }

    public function create(){
        if(auth()->user()->role_id == 1){
            $role = Role::get();
            $type = Type::get();
            return view('user.create')->with(compact('role','type'));
        }
        $role = Role::where('role','!=','admin')->get();
        $type = Type::get();


        return view('user.create')->with(compact('role','type'));
    }

    public function store(Request $request){
//        dd($request->all());

        $new = new User();
        $new->first_name = $request->first_name;
        $new->middle_name = $request->middle_name;
        $new->last_name = $request->last_name;
        $new->role_id = $request->role;
        $new->email = $request->email;
        $new->password = Hash::make($request->password);
        $new->type_id = $request->type;
        $new->save();

        Alert::success('Confirmed', 'Successfully Save');

        return redirect()->back();
    }



}
