@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(auth()->user()->type_id == 1 || auth()->user()->type_id == 3)
                    <div class="card-header">
                        <h4 class="card-title"> User's Table | <a href="{{route('user.create')}}">Add User </a> </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Role</th>
                                <th>Type</th>
                                <th>Action</th>
                                </thead>

                                @foreach($users as $user)
                                    <tbody>

                                    <td>{{$user->first_name}} </td>
                                    <td>{{$user->middle_name}} </td>
                                    <td> {{$user->last_name}}</td>
                                    <td>{{$user->role()->first()->role}} </td>
                                    <td>{{$user->type()->first()->type}} </td>
                                    <td>
                                        <button class="btn btn-primary">Edit</button>
                                    </td>
                                    </tbody>
                                @endforeach

                            </table>
                        </div>
                    </div>
            </div>
            @else
                Need Permision to access this page
            @endif
        </div>

    </div>

@endsection


@section('scripts')

@endsection
