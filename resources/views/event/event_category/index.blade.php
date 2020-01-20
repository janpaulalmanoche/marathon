@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ucfirst($event->title)}} - {{date('F d Y',strtotime($event->date))}} </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Category</th>
                            <th>Action</th>
                            </thead>
                            @foreach($category as $cat)
                                <tbody>
                                <td> {{$cat->category}}</td>
                                <td>
                                    <form method="post" action="{{url('/event-category-store')}}">
                                        @csrf
                                        <a href="">
                                            <input type="hidden" value="{{$cat->id}}" name="category_id">
                                            <input type="hidden" value="{{$event->id}}" name="event_id">
                                            <button type="submit" class="btn btn-success">Add to Event</button>
                                        </a>
                                    </form>
                                </td>
                                </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

@endsection
