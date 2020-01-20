@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Events Table | <a href="{{route('event.create')}}"> Add</a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Event</th>
                            <th>Organizer</th>
                            <th>Event Date</th>
                            <th>Action</th>
                            {{--<th>time</th>--}}
                            </thead>
                            @foreach($events as $eve)
                            <tbody>
                            <td> {{$eve->title}}</td>
                            <td> {{$eve->organizer}}

                            </td>
                            <td> {{date('F d Y',strtotime($eve->date))}}</td>
                            <td>
                                <a href="{{route('event.show',$eve->id)}}"><button class="btn btn-success">Details</button></a>
                                <a href="{{url('/event-category',$eve->id)}}"> <button class="btn btn-primary">Category</button> </a>

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
