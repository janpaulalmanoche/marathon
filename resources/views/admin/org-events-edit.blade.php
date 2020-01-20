@extends('layouts.orglayouts')


@section('title')
    organizer page
@endsection
  

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <Div class="card-header">
                    <h4>Edit events</h4>
                </Div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="/role-events-update/{{ $events->id }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                    <div class="form-group">
                        <label>Events Name</label>
                            <input type="text" name="nevent" value="{{ $events->nevent }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Host/organizer</label>
                            <input type="events" name="norganizer" value="{{ $events->norganizer }}" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>select Date</label>
                            <input type="text" name="sedate" value="{{ $events->sedate }}" class="datepicker-here form-control" data-language='en' data-multiple-dates="3" 
                                data-multiple-dates-seperator=", "
                                data-position='bottom center'/>     
                    </div>
                    <div class="form-group">
                        <label>Choose time</label>
                            <input type="text"  id="time" name="setime" value="{{ $events->setime }}" class="form-control"/>
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="/role-org-events-table" class="btn btn-danger">cancel</a>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection


@section('scripts')


@endsection
