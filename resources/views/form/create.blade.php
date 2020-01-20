@extends('layouts.playouts')


@section('title')
    organizer page
@endsection


@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <Div class="card-header">
                        <h4>Add</h4>
                    </Div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{}}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label>Events Name</label>
                                        <input type="text" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Host/organizer</label>
                                        <input type="text"  class="form-control" required>
                                    </div>


                                    <button type="submit" class="btn btn-success">Update</button>
                                    {{--<a href="/role-org-events-table" class="btn btn-danger">cancel</a>--}}
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
