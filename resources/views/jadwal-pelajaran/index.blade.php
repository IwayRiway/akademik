@extends('templates/main')
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
     <div class="section-header-button">
        <a href="{{route('jadwal-pelajaran.create')}}" class="btn btn-primary">Add New</a>
    </div>
   </div>

   <div class="section-body">

      <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-body">

                

                </div>
            </div>
        </div>
    </div>

   </div>
 </section>
   
@endsection('content')

 