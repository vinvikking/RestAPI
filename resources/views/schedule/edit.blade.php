@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Schedule</li>
        <li class="breadcrumb-item active" aria-current="page">Profiel aanpassen</li>
    </ol>
@endsection


@section('body')


<ul class="nav nav-tabs" id="myTab" role="tablist">
         <li class="nav-item">
            <a class="nav-link active" id="scheduledata-tab" data-toggle="tab" href="#scheduleinfo" role="tab" aria-controls="scheduleinfo" aria-selected="true"><i class="far fa-address-card"></i>&nbsp;Recording</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="overlaydata-tab" data-toggle="tab" href="#overlayinfo" role="tab" aria-controls="overlayinfo" aria-selected="true"><i class="far fa-address-card"></i>&nbsp;Overlays</a>
        </li>
</ul>
<p>{{ request()->route('customer') }}</p>

<div class="tab-content">
        <!--------------------------------------------------------------basisgegevens tab------------------------------------------------------------------------->
        <div class="tab-pane active" id="scheduleinfo" role="tabpanel" aria-labelledby="scheduledetails-tab">
             <div class="flex-fill">
                        @foreach($schedule['data'] as $schedule)
                        @if($schedule['id'] == request()->route('customer')) 
                      @php  
                      
                      $t = $schedule['type_settings']['views'][0]['camera_name'];
                      
                      print_r($t); 

                      foreach($servers['data'] as $server) {
                          if($schedule['server_id'] == $server['id']) {
                              $servername = $server['host_name'];
                              $serverid = $server['id'];
                          }
                      }
                      
                      @endphp
                     

                        <div class="card">
                            
                            <div class="card-header text-center font-weight-bold">
                            Aanpassennn
                            </div>
                            <div class="card-body">
                            <form name="add-blog-post-form" id="add-blog-post-form" method="post"  action="/schedule/store">
                            @csrf
                                <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input value="{{ $schedule['title']}}" type="text" id="title" name="title" class="form-control" required="">
                                </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Server</label>
                                <select  readonly name="server_id" class="form-control" id="serverInput">
                                <option value="{{ $serverid }}">{{ $servername }}</option>
                                </select> 
                              
                            </div>
                            <div class="form-group">
                                <label value="{{$schedule['type_settings']['sport']}}" for="exampleFormControlSelect1">Sport </label>
                                <select name="sport" class="form-control" id="selectCustomerInput">
                                <option value="football">football</option>
                                <option value="basket">basket</option>
                                <option value="tennis">tennis</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Camera</label>
                                <select readonly name="camera" id="cameraSelect" class="form-control"> 
                                <option value="#">{{$schedule['type_settings']['views'][0]['camera_name']}}</option> 
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Streaming url </label>
                                <input value="{{$schedule['type_settings']['views'][0]['url']}}" placeholder="" type="text" id="title" name="url" class="form-control" required="" placeholder="#">
                                </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Start</label>
                                    <input value="{{$schedule['schedule']['start_time']}}" type="datetime-local" id="start" name="start" class="form-control" required="" placeholder="{{$schedule['schedule']['start_time']}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Eind</label>
                                <input value="{{$schedule['schedule']['end_time']}}" type="datetime-local" id="end" name="end" class="form-control" required="" placeholder="{{$schedule['schedule']['end_time']}}">
                            </div> 
                                <button class="btn btn-success mt-3 mb-3 mr-2 float-right" type="submit">Opslaan</button>
                                <a class="btn btn-danger mt-3 mb-3 mr-2 float-right" href="#">Verwijderen <i class="fa fa-trash"></i></a>
                               
                            </form>
                            </div>
                        </div>
                        @endif
                        @endforeach
            </div>
        </div>
        @php 
        foreach($overlays['data'] as $overlay){
          echo $overlay['type_settings']['image_location'];
        }
        @endphp           
        <div class="tab-pane" id="overlayinfo" role="tabpanel" aria-labelledby="overlayinfo-tab"><div class="d-flex">
                <div class="flex-fill">
                    <div class="card">
                         <div class="card-body">
                            <div class="row">
                                <div class="col">
                                 <div class="card text-center">
                                     <div class="card-header">
                                        <form name="add-blog-post-form" id="add-blog-post-form" method="post"  action="/overlays/create/{{request()->route('customer')}}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label for="exampleInputEmail1">Title</label>
                                                <input type="text" id="title" name="title" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Start</label>
                                                        <input type="datetime-local" id="start" name="start" class="form-control" required="">
                                                        </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="exampleInputEmail1">Duration in seconds</label>
                                            <input type="text" id="Duration" name="Duration" class="form-control" required="">
                                                </div>
                                            
                                            </div>
                                            <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">File</label>
                                                <input id="input-b2" name="input-b2" type="file" class="form-control file" data-show-preview="false">
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary mt-3 mb-3 mr-2 float-right" type="submit">Overlay Toevoegen</button>   
                                        </form>
                                    </div>

                                        <div class="row">
                                            <div class="card-body">
                                            <div class="col-md-5">
                                            <div class="card-header">
                                                Order
                                            </div>
                                           
                                            </div>
                                            <div class="col-md-7">
                                                    <div class="card-header">
                                                    Preview
                                                    </div>
                                                <img src="#" alt="Girl in a jacket" width="620" height="250">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                     </div>
                 </div>
            </div>
            
        </div>
       
    </div>


      

 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js">
        
            $(document).ready(function(i){
                // Check for anchor and click tab
                let hash = window.location.hash;
                $('#myTab li a').each(function() {
                    if (hash === '#' + this.hash.substr(1)) {
                        $('#' + this.id).trigger( "click" )
                    }
                });

        
</script>
@endsection