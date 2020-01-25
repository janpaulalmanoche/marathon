@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    {{--<button class="btn btn-class"> Add Walk in</button>--}}
                    <h4 class="card-title">{{ucfirst($event->title)}} - {{date('F d Y',strtotime($event->date))}} </h4>
                    <h6 class="card-title">{{ucfirst($cat_distance->category()->first()->category)}} -
                        {{$cat_distance->distance}}{{$cat_distance->measurement}} </h6>
                    <h7> No. of Participants Sign up before the event - {{$count}} <br>
                        No. of Participants Show up - {{$participant_show_up_count}}</h7> <br/>
                    <h7> Paid amount - {{$earning}}</h7>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Participant</th>
                            <th>Date Sign up</th>
                            <th>No</th>
                            <th>Status</th>
                            <th> </th>
                            </thead>
                            @foreach($participant as $par)
                            <tbody>
                            <td>
                                {{$par->user()->first()->first_name}}
                                {{$par->user()->first()->last_name}}

                            </td>

                            <td>
                                    {{date('F d Y',strtotime($par->created_at))}}

                            </td>
                            <td> {{$par->participant_no}}</td>
                            <td> {{$par->status}}</td>
                            <td>

                                @if($set_val == true)

                                    @if($par->status != 'paid')
                                <a href="{{url('confirm',$par->id)}}">
                                    <button class="btn btn-success">
                                        Confirm Participant
                                    </button>
                                </a>
                                        @else

                                        @endif

                                    @else
                                       No action
                                    @endif
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
