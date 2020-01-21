@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title"> Event : {{$event->title}} - {{date('F d Y',strtotime($event->date))}} </h6>
                    <h6 class="card-title"> Category : {{$event_cat->category()->first()->category}}</h6>
                    <h6 class="card-title"> Distance : {{$cat_distance->distance}}{{$cat_distance->measurement}}</h6>
                    <h6 class="card-title"> Fee : {{$cat_event_dis_fee->fee}}</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Participant</th>

                            </thead>
                            <tbody>
                            <td>
                                <form action="{{url('walkin-save')}}" method="post">
                                    @csrf

                            <select class="form-control" name="user_id">
                                    @foreach($user as $u)
                                    <option value="{{$u->id}}">{{$u->first_name}} {{$u->last_name}} </option>
                                        @endforeach
                            </select>

                            <br>
                                    <input type="hidden" value="{{$cat_event_dis_fee->id}}" name="cat_event_dis_fee_id">
                                    <input type="hidden" value="{{$cat_distance->id}}" name="cat_distance_id">
                                    <input type="hidden" value="{{$cat_event_dis_fee->fee}}" name="fee">
                                    <input type="hidden" value="{{$event->id}}" name="event_id">
                                    <button type="submit" class="btn btn-success">
                                                Confirm
                                    </button>


                                </form>
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
