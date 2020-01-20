@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title"> {{ucfirst($event->title)}} - {{date('F d Y',strtotime($event->date))}}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Category</th>
                            <th>Distance</th>
                            <th>Fee</th>
                            <th>time</th>
                            <th>Action</th>
                            </thead>
                            @foreach($event_category as $eve)
                            <tbody>
                            <td> {{$eve->category_distance()->first()->category()->first()->category}}</td>
                            <td>
                                {{$eve->category_distance()->first()->distance}}
                                {{$eve->category_distance()->first()->measurement}}
                            </td>

                            <td> {{number_format($eve->fee)}}</td>


                            <td> {{date('H:i',strtotime($eve->start_time))}}</td>
                            <td>
                                    <a href="{{url('event-paricipant/'.$event->id .'-'.$eve->category_distance()->first()->id)}}">
                                        <button class="btn btn-success"> Participants</button>
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
