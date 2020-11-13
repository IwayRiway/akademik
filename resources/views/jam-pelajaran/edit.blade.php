@extends('templates/main')
@push('style')
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}">
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
               <form action="{{route('jam-pelajaran.update', $jam->id)}}" method="post">
                 <div class="card-body">

                     @csrf
                     @method('PUT')
                     <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label text-right">Jam Pelajaran <code>*</code> : </label>
                        <div class="col-sm-6">
                           <div class="row">
                              <div class="col-sm-6">
                                 <input type="text" class="form-control @error('jam_awal') is-invalid @enderror" id="jam_awal" placeholder="--:--" name="jam_awal" value="{{$jam->jam_awal}}" >
                                  @error('jam_awal') <div class="text-danger mt-1">{{$errors->first('jam_awal')}}</div> @enderror
                              </div>
                              <div class="col-sm-6">
                                 <input type="text" class="form-control @error('jam_akhir') is-invalid @enderror" id="jam_akhir" placeholder="--:--" name="jam_akhir" value="{{$jam->jam_akhir}}" >
                                 @error('jam_akhir') <div class="text-danger mt-1">{{$errors->first('jam_akhir')}}</div> @enderror
                              </div>
                           </div>
                        </div>
                     </div>

                 </div>

                 <div class="card-footer text-center">
                     <button class="btn btn-primary mr-1" type="submit">Save</button>
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
  <script src="{{asset('assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>

<script>
   $(document).ready(function(){
      $('#jam_awal').timepicker({
         showInputs: false,
         showMeridian: false,
         icons: {
            up: "fa fa-chevron-circle-up",
            down: "fa fa-chevron-circle-down",
         }
      });
      $('#jam_akhir').timepicker({
         showInputs: false,
         showMeridian: false,
         icons: {
            up: "fa fa-chevron-circle-up",
            down: "fa fa-chevron-circle-down",
         }
      });
   });
</script>
@endpush