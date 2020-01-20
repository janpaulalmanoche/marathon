@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @if(auth()->user()->type_id == 1)
                <div class="card-header">
                    <h4 class="card-title"> Categories Table | <a href="{{route('category.create')}}">Add </a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-primary">
                            <th>Category</th>
                            {{--<th>Time Start</th>--}}
                            <th>Action</th>

                            </thead>
                            @foreach($category as $cat)
                            <tbody>
                            <td> {{$cat->category}}</td>
                            {{--<td> {{date('H:i',strtotime($cat->start_time))}}</td>--}}
                            <td>
                                <button class="btn btn-success">Edit</button>
                                <a href="{{url('cat-distance',$cat->id)}}">
                                    <button class="btn btn-primary">Distance</button>
                                </a>
                            </td>
                            </tbody>
                                @endforeach
                        </table>
                    </div>
                </div>
            </div>
            @else
                    Need Permision to access this page
                @endif
        </div>
    </div>

@endsection


@section('scripts')

@endsection
