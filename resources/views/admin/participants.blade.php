@extends('layouts.playouts')


@section('title')
    participants page
@endsection


@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Events Table</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>Name of event</th>
              <th>Host / Organizer</th>
              <th>Date</th>
              <th>time</th>
            </thead>
            <tbody>
           {{--@foreach ($events as $data)--}}
              {{--<tr>--}}
                {{--<td>{{ $data->nevent }}</td>--}}
                {{--<td>{{ $data->norganizer }}</td>--}}
                {{--<td>{{ $data->sedate }}</td>--}}
                {{--<td>{{ $data->setime }}</td>--}}
                {{--<td>--}}
                  {{--<Button class="btn btn-primary">Join</Button>--}}
                {{--</td>--}}
              {{--</tr>--}}
            {{--@endforeach--}}
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
