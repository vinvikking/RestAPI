@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item" aria-current="page">Schedule</li>
        <li class="breadcrumb-item active" aria-current="page">Profiel aanpassen</li>
    </ol>
@endsection

@php
setcookie(
    string "access_token",
    string $value = "eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjYyMWQxZWQ2ZjE2NGFmODM0NjY5YWZmMSIsInVzZXJfaWQiOiI0MDU2M2U4My05YmNhLTRiYmUtODE4Yi05OGZmZDljZmIwZjAiLCJzZXNzaW9uSWQiOiJiZDUxMmQ5OS1jN2U3LTQxNjktODcyNS0wOTczMzRlZmRmYTIiLCJlbWFpbEFkZHJlc3MiOiJnb3Jkb24uZ29zZXdpc2NoQHNwb3J0Y2x1YnN1cHBvcnQuY29tIiwiY3VzdG9tZXJfaWQiOiIqIiwicGFydG5lcl9pZCI6ImY0MzI1ZmQ0LTY5MTYtNDc4Zi05ZGJhLTk2ZDA0NTI5YTg2MSIsInJvbGUiOiJwYXJ0bmVyX2FkbWluIiwiaWF0IjoxNjQ5MzMzODkzLCJleHAiOjE2NDk5Mzg2OTN9.hw4mqYE1FtDAOuYbszCs1zEIBfA6CjkHRhYsrMZaeRy3rTxQmeJbSL_oWGL4q-UZnQbnnhQ6HkMmqzIopZqLvcbTDHqD0IJzClEdUor_hkjDJ4FOTW6UpEDvC8pSBhY1J3OdbcjupKB0Ji7zKS7o23YOCfwFojD18EwHLL2tjV41rNPDH4599r--wssV3GjocEPdmnYUIaGcxVwoart4L3-YjTwyz4as85iPKMwWQ0H7fhg8vEfydaqldB_lm_p_yZ_cMfvQzXw8BwYN3yGgkELA7JRzICCoLNY8czxUTToAlW1k1F2eTc3WYI9M4gH9TLJ6UjXiVcqUZCxyuFSygg",
    string $path = "/",
    string $domain = "localhost:8001",
)
@endphp


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
        
        @foreach($overlays['data'] as $overlay)
         @php echo $overlay['type_settings']['image_location']; @endphp
       <img src="{{$overlay['type_settings']['image_location']}}" alt="#t" width="620" height="250">
           @endforeach      
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
                                                
                                                <input type="file" id="file-upload"><input type="hidden" name="" id="image" value=""><br>
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

<script>
        document.getElementById("file-upload").addEventListener("change", async function({target}) {
        if (target.files && target.files.length) {
            try {
                const uploadedImageBase64 = await convertFileToBase64(target.files[0]); 
                var filename = target.files[0].name;
                console.log(uploadedImageBase64);
                $(".base64").html(uploadedImageBase64);
                $("#image").val(uploadedImageBase64);

                var fileobject = {
                    name: filename,
                    content: uploadedImageBase64.split(',')[1]
                };

                // console.log(fileobject);

                $.ajax({
                    type: "POST",
                    url: "https://sports.studioautomated.com/api/v3/file/files",
                    data: JSON.stringify(fileobject),
                    contentType: "application/json",
                    dataType: "json",
                    beforeSend: function (xhr) {
                        xhr.setRequestHeader('Authorization', 'Bearer eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.eyJpZCI6IjYyMWQxZWQ2ZjE2NGFmODM0NjY5YWZmMSIsInVzZXJfaWQiOiI0MDU2M2U4My05YmNhLTRiYmUtODE4Yi05OGZmZDljZmIwZjAiLCJzZXNzaW9uSWQiOiJiZDUxMmQ5OS1jN2U3LTQxNjktODcyNS0wOTczMzRlZmRmYTIiLCJlbWFpbEFkZHJlc3MiOiJnb3Jkb24uZ29zZXdpc2NoQHNwb3J0Y2x1YnN1cHBvcnQuY29tIiwiY3VzdG9tZXJfaWQiOiIqIiwicGFydG5lcl9pZCI6ImY0MzI1ZmQ0LTY5MTYtNDc4Zi05ZGJhLTk2ZDA0NTI5YTg2MSIsInJvbGUiOiJwYXJ0bmVyX2FkbWluIiwiaWF0IjoxNjQ5MzMzODkzLCJleHAiOjE2NDk5Mzg2OTN9.hw4mqYE1FtDAOuYbszCs1zEIBfA6CjkHRhYsrMZaeRy3rTxQmeJbSL_oWGL4q-UZnQbnnhQ6HkMmqzIopZqLvcbTDHqD0IJzClEdUor_hkjDJ4FOTW6UpEDvC8pSBhY1J3OdbcjupKB0Ji7zKS7o23YOCfwFojD18EwHLL2tjV41rNPDH4599r--wssV3GjocEPdmnYUIaGcxVwoart4L3-YjTwyz4as85iPKMwWQ0H7fhg8vEfydaqldB_lm_p_yZ_cMfvQzXw8BwYN3yGgkELA7JRzICCoLNY8czxUTToAlW1k1F2eTc3WYI9M4gH9TLJ6UjXiVcqUZCxyuFSygg');
                    },
                    success: function(result) {
                        console.log(result[0].id);
                        console.log("https://sports.studioautomated.com/api/v3/file/view/" + result[0].id);

                    },
                });

            } catch(err) {
                console.log(err);
                //handle error
            }
            }
        })

        function convertFileToBase64(file) {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = () => resolve(reader.result);
            reader.onerror = reject;
        });
        }
</script>
      

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





