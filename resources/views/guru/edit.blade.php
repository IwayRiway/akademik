@extends('templates/main')

@push('style')
    <style>
       .datepicker {
            font-size: 0.875em !important;
        }
    </style>
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
               <form action="{{route('guru.update', $guru->id)}}" method="post" enctype="multipart/form-data">
                 <div class="card-body">

                     @csrf
                     @method('PUT')
                     <div class="form-group row">
                        <label for="nip" class="col-sm-3 col-form-label text-right">Nip <code>*</code> : </label>
                        <div class="col-sm-6">
                           <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" placeholder="Nomor Induk Pegawai" name="nip" value="{{$guru->nip}}" >
                           @error('nip') <div class="text-danger mt-1">{{$errors->first('nip')}}</div> @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label text-right">Nama <code>*</code> : </label>
                        <div class="col-sm-6">
                           <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama Lengkap" name="nama" value="{{$guru->nama}}" >
                           @error('nama') <div class="text-danger mt-1">{{$errors->first('nama')}}</div> @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="tempat" class="col-sm-3 col-form-label text-right">Tempat Lahir<code>*</code> : </label>
                        <div class="col-sm-6">
                           <input type="text" class="form-control @error('tempat') is-invalid @enderror" id="tempat" placeholder="Tempat Lahir" name="tempat" value="{{$guru->tempat}}" >
                           @error('tempat') <div class="text-danger mt-1">{{$errors->first('tempat')}}</div> @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="tanggal_lahir" class="col-sm-3 col-form-label text-right">Tanggal Lahir<code>*</code> : </label>
                        <div class="col-sm-6">
                           <input type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{$guru->tanggal_lahir}}" >
                           @error('tanggal_lahir') <div class="text-danger mt-1">{{$errors->first('tanggal_lahir')}}</div> @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="jenis_kelamin" class="col-sm-3 col-form-label text-right">Jenis Kelamin<code>*</code> : </label>
                        <div class="col-sm-6">
                           <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline1" name="jenis_kelamin" class="custom-control-input" {{$guru->jenis_kelamin==1?'checked':''}} value="1">
                              <label class="custom-control-label" for="customRadioInline1">Laki - Laki</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                              <input type="radio" id="customRadioInline2" name="jenis_kelamin" class="custom-control-input" value="0" {{$guru->jenis_kelamin==0?'checked':''}}>
                              <label class="custom-control-label" for="customRadioInline2">Perempuan</label>
                            </div>
                           @error('jenis_kelamin') <div class="text-danger mt-1">{{$errors->first('jenis_kelamin')}}</div> @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="poto" class="col-sm-3 col-form-label text-right">Poto : </label>
                        <div class="col-sm-6">
                           <div class="custom-file">
                              <input type="file" class="custom-file-input" id="poto" name="poto" accept="image/*">
                              <label class="custom-file-label" for="poto">Choose file</label>
                            </div>
                           @error('poto') <div class="text-danger mt-1">{{$errors->first('poto')}}</div> @enderror
                        </div>
                     </div>

                     <div class="form-group row">
                        <label for="alamat" class="col-sm-3 col-form-label text-right">Alamat<code>*</code> : </label>
                        <div class="col-sm-6">
                           <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="Alamat Lengkap" name="alamat">{{$guru->alamat}}</textarea>
                           @error('alamat') <div class="text-danger mt-1">{{$errors->first('alamat')}}</div> @enderror
                        </div>
                     </div>

                 </div>

                 <div class="card-footer text-center">
                     <button class="btn btn-primary mr-1" type="submit">Save</button>
                     <a href="{{route('guru.index')}}" class="btn btn-secondary">Cancel</a>
                  </div>
               </form>

             </div>
         </div>
      </div>

   </div>
 </section>
   
@endsection('content')

@push('after-script')
<script src="{{asset('assets/datepicker/js/bootstrap-datepicker.js')}}"></script>

<script>
   $(document).ready(function(){
      $(".tanggal_lahir").datepicker({
         viewMode: 'years',
         format: 'yyyy/mm/dd'
      });

      $('.custom-file-input').on('change', function(){
         let filename = $(this).val().split('\\').pop();
         $(this).next('.custom-file-label').addClass("selected").html(filename);
      });
   });
</script>
@endpush