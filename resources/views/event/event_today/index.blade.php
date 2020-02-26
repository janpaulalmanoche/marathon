@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Event For Today</a> </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-secondary">
                            <th>Event</th>
                            <th>Organizer</th>
                            <th>Action</th>

                            </thead>
                            @foreach($event as $events)
                            <tbody>
                            <td> {{$events->title}}</td>
                            <td> {{$events->organizer}}</td>
                            <td>
                                <a href="{{url('/event',$events->id)}}">
                                    <button class="btn btn-success">
                                        View
                                    </button>
                                </a>
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
