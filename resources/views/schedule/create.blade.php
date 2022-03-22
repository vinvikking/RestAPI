@extends('coreui::master')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Schedule</li>
    </ol>
@endsection

@section('body')
   <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
     Formulier Schedule inplannen
    </div>
    <div class="card-body">
      <form name="add-blog-post-form" id="add-blog-post-form" method="post" action="{{url('store-form')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" id="title" name="title" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Description</label>
          <textarea name="description" class="form-control" required=""></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

      <form action="#" method="POST">
                       @csrf

                    <div class="row">
                        <div class="col-md-6 px-4 py-2">
                        <h5><b>Voornaam</b><span class="badge badge-danger ml-2">Verplicht</span></h5>
                           <input type="text" class="form-control" name="Voornaam" placeholder="Voornaam" required>
                       </div>


                        <div class="col-md-6 px-4 py-2">
                        <h5><b>Achternaam</b><span class="badge badge-danger ml-2">Verplicht</span></h5>
                           <input type="text" class="form-control" name="Voornaam" placeholder="Voornaam" required>
                       </div>
                    </div>





                       <button class="btn btn-success mt-3 mb-3 mr-2 float-right" type="submit">Aanmaken</button>
                       <a class="btn btn-danger mt-3 mb-3 mr-2 float-right" href="#">Annuleren</a>

                   </form>



</div>  
@endsection


