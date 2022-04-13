@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Customers</li>
    </ol>
@endsection


@section('body')
	
    
    <div class="card">
    <div class="card-body">

    <table id="myTable">
      <thead>
        <tr>
          <th>Name</th>
          <th>Partner</th>
          <th>Acties</th>
        </tr>
      </thead>
      <tbody>
        @foreach($customers['data'] as $customer)
        <tr>
          <td>{{ $customer['name']}}</td>
          <td>{{ $customer['partner_id']}}</td>
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