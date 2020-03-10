@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            {{--{{dd(auth()->user()->type_id)}}--}}
            @if(auth()->user()->type_id == 1 || auth()->user()->type_id == 3)
            <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Events Table</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table">
                                <thead class=" text-secondary">
                                <th>Name of event</th>
                                <th>Host / Organizer</th>
                                <th>Date</th>

                                <th>time</th>
                                </thead>
                                <tbody>
                                <td> </td>
                                </tbody>
                            </table>

                        </div>
                    </div>
            </div>
            @else
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title"> Upcoming Event</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table">
                                <thead class=" text-secondary">
                                <th>Name of event</th>
                                <th>Host / Organizer</th>
                                <th>Date</th>
                                <th>Limit</th>
                                <th>Action</th>
                                </thead>
                                @foreach($event as $eve)
                                <tbody>
                                <td>{{ucfirst($eve->title)}} </td>
                                <td>{{ucfirst($eve->organizer)}} </td>
                                <td>{{date('F d Y',strtotime($eve->date))}} </td>
                                <td> {{$eve->limit}}</td>
                                <td>
                                    <a href="{{url('event-details',$eve->id)}}">
                                            <button class="btn btn-success">
                                                Details
                                            </button>
                                    </a>
                                </td>
                                </tbody>
                                    @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection


@section('scripts')

@endsection
