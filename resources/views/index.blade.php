@extends('coreui::master')

@section('title', 'Dashboard')
@section('breadcrumb')
<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
</ol>
@endsection

@section('body')


 <div class="row">
  
      <div class="col-md-6">
            <div class="card border mb-3">
                <div class="card-header"><b>Find server by YubiKey</b></div>
                <div class="card-body text">
                    <input type="text" class="form-control" placeholder="12345678" aria-label="12345678">
                </div>
            </div>
      </div>

      <div class="col-md-6">
            <div class="card border mb-3">
                <div class="card-header"><i class="fa-solid fa-server"></i><b>Find server by host name</b></div>
                <div class="card-body text">
                    <input type="text" class="form-control" placeholder="host name" aria-label="host name">
                </div>
            </div>
      </div>
    </div>
    
    <hr>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@stop

