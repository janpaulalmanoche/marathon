@extends('layouts.playouts')


@section('title')
    organizer page
@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <Div class="card-header">
                        <h4>Add Distance to {{$cat->category}}</h4>
                    </Div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{url('distance-store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Distance</label>
                                        <input type="number" name="distance" class="form-control" required>
                                        <input type="hidden" name="category_id" value="{{$cat->id}}">
                                    </div>
                                    {{--<div class="form-group">--}}
                                        {{--<label>Mesurement</label>--}}
                                        {{--<input type="text"  class="form-control" required>--}}
                                    {{--</div>--}}


                                    <button type="submit" class="btn btn-success">Save</button>
                                    {{--<a href="/role-org-events-table" class="btn btn-danger">cancel</a>--}}
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
