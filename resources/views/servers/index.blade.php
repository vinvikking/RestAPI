@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Servers</li>
    </ol>
@endsection


@section('body')
	
    
    <div class="card">
    <div class="card-body">

    <table id="myTable">
      <thead>
        <tr>
          <th>Server</th>
          <th>Partner</th>
          <th>Customer</th>
          <th>Licensed Until</th>
          <th>Health</th>
          <th>Acties</th>
        </tr>
      </thead>
      <tbody>
        @foreach($servers['data'] as $server)
        <tr>
          <td>{{ $server['host_name']}}</td>
          <td>{{ $server['partner_id']}}</td>
          <td>{{ $server['customer_id']}}</td>
          <td>{{ $server['license']['expire']}}</td>
          <td>{{ $server['status']}}</td>
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