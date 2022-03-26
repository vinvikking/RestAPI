@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Servers</li>
    </ol>
@endsection


@section('body')
	
    <div class="container">
    <div class="card">
    <div class="card-body">

      <table class="table-striped border-success">
        <thead>
          <tr>
            <th class="text-center" data-field="host_name">
              <span class="text-success">
                 Server
              </span>
            </th>
          </tr>
        </thead>
      @foreach($servers['data'] as $servers)
      <tr>
                <th class="card-body">{{ $servers['host_name']}}</th>
                <th class="card-body"><a class="btn btn-primary" href="">Details</a></th>
        </tr>
    
@endforeach
      </table>
        </div>
      </div>
  </div>
@endsection