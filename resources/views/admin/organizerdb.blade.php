@extends('layouts.orglayouts')


@section('title')
    organizer page
@endsection
  

@section('content')

<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Organizer Table</h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <!--validation-->
            @if(count($errors) > 0)
          <div class="alert alert-danger">
            <ul>
              @foreach($errors->all() as $error)
                <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        @endif
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{ \Session::get('success') }}</p>
            </div>
        @endif

  
        <div class="row">
        <form action="/events" method="post" >
          {{csrf_field()}}
          <div class="form-group col-md-4">
            <label for="eventsname"></label>
            <input type="text" name="nevent" id="eventsname" class="form-control" autocomplete="off" placeholder="events name">
          </div>
          <div class="form-group col-md-4">
            <label for="host"></label>
            <input type="events" name="norganizer" id="host" class="form-control" autocomplete="off" placeholder="Host/Organizer">
          </div>
        
          <div class="form-group col-md-2">
            <label for="date"></label>
            <input type="text" name="sedate" id="date"  placeholder="select date" autocomplete="off" class="datepicker-here form-control" data-language='en' data-multiple-dates="3" 
            data-multiple-dates-seperator=", "
            data-position='bottom left'/>     
          </div>
          </div>
     

          <!--Jamming-->
          <div class="card-body">
           <div class="row">
            <div class="col-md-2 col-sm-2">
                <table class="table table-boardered">
                  <thead>
                      <tr>
                          <th>Category</th>
                          <th>Time</th>
                          <th style="text-align: center"><a href="#" class="btn btn-info addRow">add category</a></th>
                      </tr>   
                  </thead>
                  <tbody>
                      <tr>
                          <td><input type="text" name="category[]" class="form-control" placeholder="5k"></td>
                          <td><input type="text" id="time" name="ctime[]" class="form-control"></td>
                          <td style="text-align: center"><a href="#" class="btn btn-danger remove">-</a></td>
                      </tr>
                  </tbody>
                </table>
            </div>
         </div>
         <button type="button" class="btn btn-secondary col-md-1" data-dismiss="modal">Cancel</button>
        <button  type="submit" class="btn btn-secondary col-md-1">Save</button>
        </div>
        </form>
         </div>

       
  
          <!--Jamming-->
  
     
            </thead>
            <tbody>
              <tr>
                
              </tr>
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
