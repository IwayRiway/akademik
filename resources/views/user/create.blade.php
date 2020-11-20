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
               <form action="{{route('user.store')}}" method="post" enctype="multipart/form-data">
                 <div class="card-body">

                     @csrf
                     <div class="form-group row">
                        <label for="tipe_user" class="col-sm-3 col-form-label text-right">Pilih Tipe User <code>*</code> : </label>
                        <div class="col-sm-6">
                           <select name="tipe_user" id="tipe_user" class="form-control">
                              <option></option>
                                 <option value="1" {{ (old("tipe_user") == 1 ? "selected":"") }}>Umum</option>
                                 <option value="2" {{ (old("tipe_user") == 2 ? "selected":"") }}>Guru</option>
                                 <option value="3" {{ (old("tipe_user") == 3 ? "selected":"") }}>Siswa</option>
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
                                 <option value="{{$db->id}}" {{ (old("role") == $db->id ? "selected":"") }}>{{$db->nama}}</option>
                              @endforeach
                            </select>
                           @error('role') <div class="text-danger mt-1">{{$errors->first('role')}}</div> @enderror
                        </div>
                     </div>

                     <div class="{{ (old("tipe_user")!=1?"":"hilang") }} {{ (old("tipe_user")==0?"hilang":"") }}" id="pilih_user">
                        <div class="form-group row" >
                           <label for="user_id" class="col-sm-3 col-form-label text-right">Pilih User <code>*</code> : </label>
                           <div class="col-sm-6">
                              <select name="user_id" id="user_id" class="form-control" style="width: 100%">
                                 <option></option>
                               </select>
                               @error('user_id') <div class="text-danger mt-1">{{$errors->first('user_id')}}</div> @enderror
                           </div>
                        </div>
                     </div>

                     <div id="ket" class="{{$errors->all()?'':'hilang'}}">
                        <div class="form-group row">
                           <label for="nama" class="col-sm-3 col-form-label text-right">Nama User <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="text" name="nama" id="nama" value="{{old('nama')}}" class="form-control">
                              @error('nama') <div class="text-danger mt-1">{{$errors->first('nama')}}</div> @enderror
                           </div>
                        </div>
   
                        <div class="form-group row">
                           <label for="username" class="col-sm-3 col-form-label text-right">Username <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="text" name="username" id="username" value="{{old('username')}}" class="form-control">
                              @error('username') <div class="text-danger mt-1">{{$errors->first('username')}}</div> @enderror
                           </div>
                        </div>
   
                        <div class="form-group row">
                           <label for="email" class="col-sm-3 col-form-label text-right">Email <code>*</code> : </label>
                           <div class="col-sm-6">
                              <input type="email" name="email" id="email" value="{{old('email')}}" class="form-control">
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

    $("#tipe_user").select2({
        placeholder: "Pilih Tipe User",
        allowClear: true
    });

    $("#role").select2({
        placeholder: "Pilih Role Access",
        allowClear: true
    });

    $("#user_id").select2({
        placeholder: "Pilih User",
        allowClear: true
    });

    $('#tipe_user').on('change', function() {
        var val = this.value;
        $('#ket').removeClass('hilang');

        if(val == 2){
         myajax(`{{url('user/guru')}}`, val);
        }

        if(val == 3){
          myajax(`{{url('user/siswa')}}`, val);
        }
    });

    function myajax(params, val) {
      $('#user_id').empty();
      $('#pilih_user').removeClass('hilang');
      $.ajax({
            url : params,
            type : "POST",
            dataType : "json",
            data    : {_token:"{{csrf_token()}}", tipe_user:val},
            success : function(data) {
            $.each(data, function (i, key) {
                  var newOption = new Option(data[i].nama, data[i].id, false, false);
                  $('#user_id').append(newOption).trigger('change');
            });
            }
      });
    }

    $('#user_id').on('change', function() {
        var val = this.value;
        var tipe_user = $('#tipe_user').val();

        $.ajax({
               url : `{{url('user/user')}}`,
               type : "POST",
               dataType : "json",
               data    : {_token:"{{csrf_token()}}", user_id:val, tipe_user:tipe_user},
               success : function(data) {
                  $('#nama').val(data.nama);
                  $('#username').val(data.username);
                  $('#nama').attr('readonly', true);
               }
         });
    });

  });
</script>
@endpush