@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cameras</li>
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
            <th class="text-center" data-field="id">
              <span class="text-success ">
                 ID
              </span>
            </th>
            <th class="text-center" data-field="camera_type">
              <span class="text-success">
                Camera_types 
              </span>
            </th>
            <th class="text-center" data-field="serial_number">
              <span class="text-success">
                Serial_number  
              </span>
            </th>
            <th class="text-center" data-field="created">
              <span class="text-success">
                Created  
              </span>
            </th>
            <th class="text-center" data-field="updated">
              <span class="text-success">
                Updated  
              </span>
            </th>
            <th class="text-center" data-field="status">
              <span class="text-success">
                Status  
              </span>
            </th>
            <th class="text-center" data-field="details">
              <span class="text-success">
                Details  
              </span>
            </th>
          </tr>
        </thead>
      @foreach($cameras['data'] as $cameras)
      <tr>
                <th class="card-body">{{ $cameras['id']}}</th>
                <th class="card-body">{{ $cameras['camera_type']}}</th>
                <th class="card-body">{{ $cameras['serial_number']}}</th>
                <th class="card-body">{{ $cameras['created']}}</th>
                <th class="card-body">{{ $cameras['updated']}}</th>
                <th class="card-body">{{$cameras['status']}}</th>
                <th class="card-body"><a class="btn btn-primary" href="">Details</a></th>
        </tr>
    
@endforeach
      </table>
        </div>
      </div>
  </div>
  
@endsection