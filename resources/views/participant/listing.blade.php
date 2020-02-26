@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> My Upcoming Event </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-secondary">
                            <th>Name of event</th>
                            <th>Host / Organizer</th>
                            <th>Date</th>
                            <th>Category</th>
                            <th>time</th>
                            <th>Distance</th>
                            <th>Fee</th>
                            </thead>

                            <tbody>
                            <td> {{$event->event()->first()->title}}</td>
                            <td> {{$event->event()->first()->organizer}}</td>
                            <td> {{date('F d Y',strtotime($event->event()->first()->date))}}</td>
                            <td>
                            {{$event->event_cat_dis_fee()->first()->category_distance()->first()->category()->first()->category}}
                            </td>
                            <td> {{date('H:i',strtotime($event->event_cat_dis_fee()->first()->start_time))}}</td>
                            <td>
                                {{$event->event_cat_dis_fee()->first()->category_distance()->first()->distance}}
                                {{$event->event_cat_dis_fee()->first()->category_distance()->first()->measurement}}
                            </td>
                            <td>
                                {{number_format($event->event_cat_dis_fee()->first()->fee)}}
                            </td>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

@endsection
