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
      <button class="btn btn-success type="button" data-toggle="modal" data-target="#exampleModal">
<a> <i class="fas fa-plus mr-2" ></i>Nieuwe Recording</a>
</button>



    <table id="myTable">
      <thead>
        <tr>
          <th>Type</th>
          <th>Sport</th>
          <th>Schedule</th>
          <th>Status</th>
          <th>Acties</th>
        </tr>
      </thead>
      <tbody>
        @foreach($schedule['data'] as $schedule)
        <tr>
          <td>{{ $schedule['type']}}</td>
          <td>{{ $schedule['type_settings']['sport']}}</td>
          <td>{{ $schedule['schedule']['start_time']}}-{{ $schedule['schedule']['end_time']}}</td>
          <td>{{ $schedule['status']}}</td>
          <td><a class="btn btn-primary" href="schedule/edit/{{$schedule['id']}}">Details</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>

        </div>
      </div>
  </div>
 



 <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Please select a customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Customer</label>
    <select class="form-control" id="selectCustomerInput">
      @foreach($customers['data'] as $customer)
      <option value="{{$customer['id']}}">{{$customer['name']}}</option>
      @endforeach
    </select>
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id="selectCustomerButton" type="button" class="btn btn-primary" href="#">Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

$(document).on('click', "#selectCustomerButton", function() {
  window.location.href = '/schedule/create/' + $("#selectCustomerInput").val();
});
</script>

<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>




@endsection