@extends('templates/main')
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
   </div>

   <div class="section-body">

      <div class="row">
         <div class="col-sm-12">
             <div class="card card-primary">
               <form action="{{route('role-access.store')}}" method="post" enctype="multipart/form-data">
                 <div class="card-body">

                     @csrf
                     <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label text-right">Nama <code>*</code> : </label>
                        <div class="col-sm-6">
                           <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Role Access" name="nama" value="{{old('nama')}}" >
                           @error('nama') <div class="text-danger mt-1">{{$errors->first('nama')}}</div> @enderror
                        </div>
                     </div>

                 </div>

                 <div class="card-footer text-center">
                     <button class="btn btn-primary mr-1" type="submit">Submit</button>
                     <a href="{{route('role-access.index')}}" class="btn btn-secondary">Cancel</a>
                  </div>
               </form>

             </div>
         </div>
      </div>

   </div>
 </section>
   
@endsection('content')