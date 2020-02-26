@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
           
                <div class="card-header">
                    <h4 class="card-title"> Categories List | <a href="{{route('category.create')}}">Add </a></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class=" text-secondary">
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
  
        </div>
    </div>

@endsection


@section('scripts')

@endsection
