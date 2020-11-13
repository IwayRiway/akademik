@extends('templates/main')
@push('style')
{{-- <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/select2/dist/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/modules/jquery-selectric/selectric.css')}}"> --}}
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
{{-- <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}"> --}}
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
               <form action="{{route('jam-pelajaran.store')}}" method="post">
                 <div class="card-body">

                     @csrf
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label text-right">Jam Pelajaran <code>*</code> : </label>
                        <div class="col-sm-6">
                           <div class="row">
                              <div class="col-sm-6">
                                 <input type="text" class="form-control @error('jam_awal') is-invalid @enderror" id="jam_awal" placeholder="--:--" name="jam_awal" value="{{old('jam_awal')}}" >
                                  @error('nama') <div class="text-danger mt-1">{{$errors->first('nama')}}</div> @enderror
                              </div>
                              <div class="col-sm-6">
                                 <input type="text" class="form-control @error('jam_akhir') is-invalid @enderror" id="jam_akhir" placeholder="--:--" name="jam_akhir" value="{{old('jam_akhir')}}" >
                                 @error('jam_akhir') <div class="text-danger mt-1">{{$errors->first('jam_akhir')}}</div> @enderror
                              </div>
                           </div>
                        </div>
                     </div>

                 </div>

                 <div class="card-footer text-center">
                     <button class="btn btn-primary mr-1" type="submit">Submit</button>
                     <a href="{{route('jam-pelajaran.index')}}" class="btn btn-secondary">Cancel</a>
                  </div>
               </form>

             </div>
         </div>
      </div>

   </div>
 </section>
   
@endsection('content')

@push('after-script')
{{-- <script src="{{asset('assets/modules/cleave-js/dist/cleave.min.js')}}"></script>
  <script src="{{asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
  <script src="{{asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script> --}}
  <script src="{{asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
  {{-- <script src="{{asset('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')}}"></script>
  <script src="{{asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
  <script src="{{asset('assets/modules/jquery-selectric/jquery.selectric.min.js')}}"></script>
<script src="{{asset('assets/js/page/forms-advanced-forms.js')}}"></script> --}}

<script>
   $(document).ready(function(){
      $('#jam_awal').timepicker({
         showInputs: false,
         showMeridian: false
      });
   });
</script>
@endpush