@extends('templates/main')
@push('style')
<link rel="stylesheet" href="{{asset('assets/modules/select2/dist/css/select2.min.css')}}">
@endpush
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
   </div>

   <div class="section-body">

      <div class="row">
         <div class="col-sm-12">
             <div class="card card-primary">
               <form action="{{route('user.update', $user->id_user)}}" method="post" enctype="multipart/form-data">
                 <div class="card-body">

                     @csrf
                     @method('PUT')
                     <div class="form-group row">
                        <label for="tipe_user" class="col-sm-3 col-form-label text-right">Pilih Tipe User <code>*</code> : </label>
                        <div class="col-sm-6">
                           <select name="tipe_user" id="tipe_user" class="form-control select2" disabled>
                                 <option value="1" {{ ($user->tipe_user == 1 ? "selected":"") }}>Umum</option>
                                 <option value="2" {{ ($user->tipe_user == 2 ? "selected":"") }}>Guru</option>
                                 <option value="3" {{ ($user->tipe_user == 3 ? "selected":"") }}>Siswa</option>
                            </select>
                           @error('tipe_user') <div class="text-danger mt-1">{{$errors->first('tipe_user')}}</div> @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="role" class="col-sm-3 col-form-label text-right">Pilih Role User <code>*</code> : </label>
                        <div class="col-sm-6">
                           <select name="role" id="role" class="form-control">
                              <option></option>
                              @foreach ($role as $db)
                                 <option value="{{$db->id}}" {{ ($user->hak_akses == $db->id ? "selected":"") }}>{{$db->nama}}</option>
                              @endforeach
                            </select>
                           @error('role') <div class="text-danger mt-1">{{$errors->first('role')}}</div> @enderror
                        </div>
                     </div>

                     <div id="ket" class="">
                        <div class="form-group row">
                           <label for="nama" class="col-sm-3 col-form-label text-right">Nama User <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="text" name="nama" id="nama" value="{{$user->nama}}" class="form-control" disabled>
                              @error('nama') <div class="text-danger mt-1">{{$errors->first('nama')}}</div> @enderror
                           </div>
                        </div>
   
                        <div class="form-group row">
                           <label for="username" class="col-sm-3 col-form-label text-right">Username <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="text" name="username" id="username" value="{{$user->username}}" class="form-control">
                              @error('username') <div class="text-danger mt-1">{{$errors->first('username')}}</div> @enderror
                           </div>
                        </div>
   
                        <div class="form-group row">
                           <label for="email" class="col-sm-3 col-form-label text-right">Email <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control">
                              @error('email') <div class="text-danger mt-1">{{$errors->first('email')}}</div> @enderror
                           </div>
                        </div>
   
                        <div class="form-group row">
                           <label for="password" class="col-sm-3 col-form-label text-right">Password <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="password" name="password" id="password" value="{{old('password')}}" class="form-control">
                              @error('password') <div class="text-danger mt-1">{{$errors->first('password')}}</div> @enderror
                           </div>
                        </div>
                     </div>

                 </div>

                 <div class="card-footer text-center">
                     <button class="btn btn-primary mr-1" type="submit">Submit</button>
                     <a href="{{route('user.index')}}" class="btn btn-secondary">Cancel</a>
                  </div>
               </form>

             </div>
         </div>
      </div>

   </div>
 </section>
   
@endsection('content')

@push('after-script')
<script src="{{asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script>

  $(document).ready(function(){

    $("#role").select2({
        placeholder: "Pilih Role Access",
        allowClear: true
    });

  });
</script>
@endpush