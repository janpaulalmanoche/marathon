@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Events Table | <a href="">Add</a> </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-secondary">
                            <th>Name</th>
                            <th> Category distance </th>
                            <th>Participant No</th>
                           
                            </thead>
                                <form action="{{url('par-no')}}" method="post">
                                @csrf
                            <tbody>
                            <td> {{$event_cat_dis_fee_par->user()->first()->first_name}}
                                {{$event_cat_dis_fee_par->user()->first()->last_name}}
                            </td>

                            <td>
                        {{$event_cat_dis_fee_par->event_cat_dis_fee()->first()->category_distance()->first()->distance}}
                        {{$event_cat_dis_fee_par->event_cat_dis_fee()->first()->category_distance()->first()->measurement}}
                            </td>

                            <td>
                             <input type="text" class="form-control" name="par_no" autofocus>
                             <input type="hidden" class="form-control" name="event_id" value="{{$event_cat_dis_fee_par->id}}" >
                              </td>
                            </tbody>
                       </form>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')

@endsection
