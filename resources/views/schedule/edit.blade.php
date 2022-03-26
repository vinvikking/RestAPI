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
            <a class="nav-link active" id="campaigndata-tab" data-toggle="tab" href="#campaigninfo" role="tab" aria-controls="campaigninfo" aria-selected="true"><i class="far fa-address-card"></i>&nbsp;Recording</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="campaigndata-tab" data-toggle="tab" href="#campaigninfo" role="tab" aria-controls="campaigninfo" aria-selected="false"><i class="far fa-address-card"></i>&nbsp;Overlays</a>
        </li>
</ul>

<div class="tab-content">
        <!--------------------------------------------------------------basisgegevens tab------------------------------------------------------------------------->
        <div class="tab-pane active" id="campaigndetails" role="tabpanel" aria-labelledby="campaigndetails-tab">
             <div class="flex-fill">
                        @foreach($schedule['data'] as $schedule)
                        @if($schedule['id'] == request()->route('customer')) 
                        <div class="card">
                            
                            <div class="card-header text-center font-weight-bold">
                            Aanpassen
                            </div>
                            <div class="card-body">
                            <form name="add-blog-post-form" id="add-blog-post-form" method="post"  action="/schedule/store">
                            @csrf
                                <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" id="title" name="title" class="form-control" required="" placeholder="{{ request()->route('customer') }}">
                                </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Server</label>
                                <select name="server_id" class="form-control" id="serverInput">
                                <option value="{{ $schedule['title']}}">{{ $schedule['title']}}</option>
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
                                <input placeholder="" type="text" id="title" name="url" class="form-control" required="" placeholder="#">
                                </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Start</label>
                                    <input type="datetime-local" id="start" name="start" class="form-control" required="" placeholder="{{$schedule['schedule']['start_time']}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Eind</label>
                                <input type="datetime-local" id="end" name="end" class="form-control" required="" placeholder="{{$schedule['schedule']['end_time']}}">
                            </div> 
                                <button class="btn btn-success mt-3 mb-3 mr-2 float-right" type="submit">Opslaan</button>
                                <a class="btn btn-danger mt-3 mb-3 mr-2 float-right" href="/home">Annuleren</a>
                            </form>
                            </div>
                        </div>
                        @endif

                        @endforeach
            </div>
        </div>

        <div class="tab-pane" id="campaigninfo" role="tabpanel" aria-labelledby="campaigninfo-tab"><div class="d-flex">
              <div class="flex-fill">
                 <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                     <div class="card text-center">
                      <div class="card-header">
    <form name="add-blog-post-form" id="add-blog-post-form" method="post"  action="/schedule/store">
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
            <input type="text" id="File" name="start" class="form-control" required="">
            </div>
           </div>
       </div>   
      </form>
                </div>
             </div>
        </div>
</div>
                    <div class="row">
                        <div class="col-md-4">
                        <div class="card-header">
                        Order
                        </div>
                        </div>
                        <div class="col-md-8">
                        <div class="card-header">
                        Preview
                        </div>
                        </div>
                    </div>

                             <button class="btn btn-success mt-3 mb-3 mr-2 float-right" type="submit">Aanmaken</button>
                             <a class="btn btn-danger mt-3 mb-3 mr-2 float-right" href="/home">Annuleren</a>
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