@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Cameras</li>
    </ol>
@endsection


@section('body')
	
    <div class="card">
    <div class="card-body">
    
    <table id="myTable">
      <thead>
        <tr>
          <th>Device</th>
          <th>Name</th>
          <th>Health</th>
          <th>Acties</th>
        </tr>
      </thead>
      <tbody>
        @foreach($cameras['data'] as $camera)
        <tr>
          <td>{{$camera['camera_type']}} - {{$camera['serial_number']}}</td>
          <td>{{$camera['name']}}</td>
          <td>{{$camera['status']}}</td>
          <td><a class="btn btn-primary" href="#"><i class="fa fa-info"></i></a></td>
        </tr>
        @endforeach
      </tbody>
    </table>

        
      </div>
  </div>
  

<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>

@endsection