@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Schedule</li>
    </ol>
@endsection


@section('body')
	
   <div class="container">
    <div class="card">
    <div class="card-body">
    <h1 class="text text-center text-center ">
      GeeksforGeeks
    </h1>
    <h6 class="text text-success text-center">
      A computer science portal for geeks
    </h6>
      <table class="table-striped border-success">
        <thead>
          <tr>
            <th class="text-center" data-field="type">
              <span class="text-success ">
                 type
              </span>
            </th>
            <th class="text-center" data-field="sport">
              <span class="text-success">
                SPORT 
              </span>
            </th>
            <th class="text-center" data-field="schedule">
              <span class="text-success">
                SCHEDULE  
              </span>
            </th>
            <th class="text-center" data-field="status">
              <span class="text-success">
                STATUS  
              </span>
            </th>
          </tr>
        </thead>
      @foreach($schedule['data'] as $schedule)
      <tr>
                <th class="card-body">{{ $schedule['type']}}</th>
                <th class="card-body">{{ $schedule['type_settings']['sport']}}</th>
                <th class="card-body">{{ $schedule['schedule']['start_time']}}</th>
                <th class="card-body">{{ $schedule['status']}}</th>
                <th class="card-body"><a class="btn btn-primary" href="">Details</a></th>
        </tr>
    
@endforeach
      </table>
        </div>
      </div>
  </div>
 


@endsection