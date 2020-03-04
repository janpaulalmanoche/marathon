@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> {{$event->title}} - {{date('F d Y',strtotime($event->date))}} </h4>
                    <h4 class="card-title"> Category - {{$category->category}}</h4>
                    <h4 class="card-title"> Available distance's :</h4>
                    <h4 class="card-title">
                        <a href="{{url('/event-category',$event->id)}}">
                        Back
                        </a>
                        |
                        <a href="{{route('event.index')}}">
                            Finish
                        </a>
                    </h4>
                </div>
                <form action="{{url('/event-category-distance/store')}}" method="post">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Distance</th>
                            <th>Fee</th>
                            <th>Start Time</th>
                            <th>Action</th>

                            </thead>
                            @foreach($category_distances as $distance)

                                    @csrf
                                    <tbody>
                                    <td> {{$distance->distance}}  {{$distance->measurement}}</td>
                                    <td>
                                        <input type="number" name="fee" class="form-control" required>
                                        <input type="hidden" name="event_id" value="{{$event->id}} ">
                                        <input type="hidden" name="event_category_id" value="{{$event_category->id}}">
                                        <input type="hidden" name="category_distance_id" value="{{$distance->id}}">
                                    </td>
                                    <td>
                                        <input type="time" name="start_time" class="form-control" required>

                                    </td>
                                    <td>
                                        <button type="submit">
                                            Add
                                        </button>

                                    </td>
                                    </tbody>
                                </form>
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
