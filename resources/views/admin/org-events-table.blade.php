@extends('layouts.orglayouts')


@section('title')
    organizer page
@endsection


@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Events Table</h4>
        @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-secondary">
              <th>id</th>
              <th>Events Name</th>
              <th>Host/organizer</th>
              <th>Date</th>
              <th>Time</th>
            </thead>
            <tbody>
                @foreach  ($events as $row)
                <tr>
                  <td>  {{ $row->id }}  </td>
                  <td>  {{ $row->nevent }}  </td>
                  <td>  {{  $row->norganizer  }}  </td>
                  <td>  {{ $row->sedate }}  </td>
                  <td>  {{ $row->setime }}  </td>
                  <td>
                    <a href="/org-events-edit/{{ $row->id }}" class="btn btn-success">Edit</a>
                  </td>
                  <td>
                  <form action="/org-events-delete/{{ $row->id }}" method="post">
                          {{ csrf_field() }}
                          {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </form>
                  </td>
                </tr>
                @endforeach
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
