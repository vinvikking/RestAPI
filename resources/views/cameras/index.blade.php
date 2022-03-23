@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cameras</li>
    </ol>
@endsection


@section('body')
	
    <p>Cameras </p>
      
  @foreach($cameras['data'] as $cameras)
      <tr>
            <th class="text-center">
                <i class="icon-people"></i>
            </th>
                <th>{{ $cameras['camera_type']}}</th>
                <th>{{ $cameras['serial_number']}}</th>
                <th>{{ $cameras['created']}}</th>
                <th>{{ $cameras['updated']}}</th>
                <th>{{$cameras['status']}}</th>
            <th><a class="btn btn-primary" href="">Details</a></th>
        </tr>
    
@endforeach
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
            <th data-field="id">
              <span class="text-success">
                 ID
              </span>
            </th>
            <th data-field="camera_type">
              <span class="text-success">
                camera_types 
              </span>
            </th>
            <th data-field="serial_number">
              <span class="text-success">
                serial_number  
              </span>
            </th>
          </tr>
        </thead>
      </table>
        </div>
      </div>
  </div>
  
   <script src=
"https://code.jquery.com/jquery-3.3.1.min.js">
  </script>
  <script src=
"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js">
  </script>
  <script src=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js">
  </script>

 <!-- Include the JavaScript file
  for Bootstrap table -->
  <script src=
"https://unpkg.com/bootstrap-table@1.16.0/dist/bootstrap-table.min.js">
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
  
      // Use the given data to create 
      // the table and display it
      $('table').bootstrapTable({
        data: mydata
      });
    });
    //console.log(mydata);
    // Specify the JSON data to be displayed
    //var mydata = "";

    $.ajax({
    type: "POST",
    url: '/cameras', // This is what I have updated
    data: { id: 7 }
}).done(function( msg ) {
    alert( msg );
});

  </script>

@endsection