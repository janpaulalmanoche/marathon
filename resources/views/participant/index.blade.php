@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Event : {{$event->title}} - {{date('F d Y',strtotime($event->date))}}</h4>
                </div>
                <div class="card-body">

                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Category</th>
                            <th>Distance</th>
                            <th>Fee</th>
                            <th>limit</th>
                            <th>time</th>
                            {{--<th>No. Participant</th>--}}
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
                                <td> {{$eve->events()->first()->limit}}</td>


                                <td> {{date('H:i',strtotime($eve->start_time))}}</td>

                                {{--<td> {{$eve->participant()}}</td>--}}

                                <td>
                                    <form action="{{url('join')}}" method="post">@csrf
                                        <input type="hidden" value="{{$eve->id}}" name="event_cat_dis_fees_id">
                                        <input type="hidden" value="{{$eve->category_distances_id}}" name="category_distances_id">
                                        <input type="hidden" value="{{$eve->fee}}" name="fee">
                                        <input type="hidden" value="{{$eve->event_cat()->first()->id}}" name="event_categories_id">



                                            <button type="submit" class="btn btn-success">
                                                Join
                                            </button>
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
