@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"> Category : {{$cat->category}} | <a href="{{url('/distance-create',$cat->id)}}">Add Distance</a> </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Distance</th>
                            <th>Measurement</th>
                            <th>Action</th>
                            </thead>
                            @foreach($distance as $dis)
                            <tbody>
                            <td>{{$dis->distance}} </td>
                            <td>{{$dis->measurement}} </td>
                            <td><button class="btn btn-success">Edit </button></td>
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
