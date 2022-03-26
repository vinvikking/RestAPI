@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Schedule</li>
        <li class="breadcrumb-item active" aria-current="page">Profiel aanpassen</li>
    </ol>
@endsection

@section('body')

<div class="card">
    <div class="card-header text-center font-weight-bold">
     Aanpassen
    </div>
    <div class="card-body">
    <form name="add-blog-post-form" id="add-blog-post-form" method="post"  action="/schedule/store">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="title" name="title" class="form-control" required="">
        </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Server</label>
        <select name="server_id" class="form-control" id="serverInput">
         @foreach($servers['data'] as $server)
         <option value="{{ $server['id']}}">{{ $server['host_name']}}</option>
         @endforeach
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Sport</label>
        <select name="sport" class="form-control" id="selectCustomerInput">
          <option value="football">football</option>
          <option value="basket">basket</option>
          <option value="tennis">tennis</option>
          </select>
      </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Camera</label>
          <select name="camera" id="cameraSelect" class="form-control">
            @foreach($servers['data'] as $server)
            @foreach($server['cameras'] as $camera_name => $camera_data)
            <option data-server="{{ $server['id'] }}" value="{{ $camera_data['camera_id'] }}">{{ $camera_name }}</option>
            @endforeach
            @endforeach
          </select>
      </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Streaming url</label>
          <input placeholder="" type="text" id="title" name="url" class="form-control" required="">
        </div>
      <div class="form-group">
            <label for="exampleInputEmail1">Start</label>
            <input type="datetime-local" id="start" name="start" class="form-control" required="">
      </div>
      <div class="form-group">
          <label for="exampleInputEmail1">Eind</label>
          <input type="datetime-local" id="end" name="end" class="form-control" required="">
      </div> 
        <button class="btn btn-success mt-3 mb-3 mr-2 float-right" type="submit">Opslaan</button>
        <a class="btn btn-danger mt-3 mb-3 mr-2 float-right" href="/home">Annuleren</a>
      </form>
    </div>
</div>
@endsection


