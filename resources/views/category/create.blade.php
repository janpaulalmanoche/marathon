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
                        <h4>Add Category</h4>
                    </Div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{route('category.store')}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="category" class="form-control" required>
                                    </div>
                                    {{--<div class="form-group">--}}
                                        {{--<label>Time Start</label>--}}
                                        {{--<input type="time" name="start" class="form-control" required>--}}
                                    {{--</div>--}}


                                    <button type="submit" class="btn btn-success">Save</button>

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
