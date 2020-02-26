@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">

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
                                <th>Action</th>
                                </thead>
                                @foreach($event as $eve)
                                    <tbody>
                                    <td>{{ucfirst($eve->title)}} </td>
                                    <td>{{ucfirst($eve->organizer)}} </td>
                                    <td>{{date('F d Y',strtotime($eve->date))}} </td>
                                    <td>
                                        <a href="{{route('walkin.show',$eve->id)}}">
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
        </div>
    </div>

@endsection


@section('scripts')

@endsection
