    @extends('layouts.playouts')


    @section('title')
        participants page
    @endsection


    @section('content')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h7 class="card-title"> {{ucfirst($event->title)}} - {{date('F d Y',strtotime($event->date))}}</h7>
                    <br>    <h7 class="card-title">No. Participant Sign up : {{$participant_sign_up}}</h7>
                    <br>    <h7 class="card-title">No. Participant Present in event: {{$participant_present}}</h7>
                    <br>    <h7 class="card-title">Total Revenue - {{number_format($amount)}}</h7>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead class=" text-primary">
                                <th>Category</th>
                                <th>Participant</th>
                                <th>Distance</th>
                                <th>time</th>
                                {{--<th>time</th>--}}
                                @foreach($participant as $par)
                                </thead>
                                <tbody>
                                <td> {{$par->distance()->first()->category()->first()->category}}</td>
                                <td> {{$par->user()->first()->first_name}}  {{$par->user()->first()->last_name}}</td>
                                <td>
                                    {{$par->distance()->first()->distance}}
                                    {{$par->distance()->first()->measurement}}
                                </td>
                                <td>
                                        {{date('H:i',strtotime($par->event_cat_dis_fee()->first()->start_time))}}
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
