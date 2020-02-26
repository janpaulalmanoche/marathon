@extends('layouts.playouts')



@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Events </a> </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-secondary">
                            <th>Event</th>
                            <th>Organizer</th>
                            <th>Date</th>
                            <th>Action</th>
                            </thead>

                            @foreach($event as $eve)
                            <tbody>
                            <td> {{$eve->title}}</td>
                            <td> {{$eve->organizer}}</td>
                            <td> {{date('F d Y',strtotime($eve->date))}}</td>
                            <td>
                                <a href="{{url('report-event',$eve->id)}}">
                                    <button class="btn btn-success">
                                        Report
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
