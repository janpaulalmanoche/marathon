@extends('layouts.playouts')


@section('title')
    add user page
@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <Div class="card-header">
                        <h4>Add User</h4>
                    </Div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('user.store')}}" method="POST">
                                  @csrf
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" name="first_name"  class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Middle name</label>
                                        <input type="text"  name="middle_name" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text"  name="last_name" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email"  name="email" class="form-control" >
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password"  name="password" class="form-control" >
                                    </div>

                                    <div class="form-group">
                                        <label>Role</label>
                                        <select  class="form-control" name="role">
                                            @foreach($role as $roles)
                                            <option value="{{$roles->id}}"> {{$roles->role}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Type</label>
                                        <select  class="form-control" name="type">
                                            @foreach($type as $types)
                                            <option value="{{$types->id}}"> {{$types->type}}</option>
                                                @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Save</button>
                                    <a href="/role-org-events-table" class="btn btn-danger">cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('scripts')


@endsection
