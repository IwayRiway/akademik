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

                <div class="card-body" id="jadwal">
                  <input type="hidden" name="id" id="id" value="{{$jadwal->id}}">
                  <div class="form-group row">
                    <label for="kelas" class="col-sm-3 col-form-label text-right">Pilih Kelas <code>*</code> : </label>
                    <div class="col-sm-6">
                       <select name="kelas" id="kelas" class="form-control">
                         <option value="X" {{$jadwal->kelas=='X'?'selected':''}}>X</option>
                         <option value="XI" {{$jadwal->kelas=='XI'?'selected':''}}>XI</option>
                         <option value="XII" {{$jadwal->kelas=='XII'?'selected':''}}>XII</option>
                       </select>
                    </div>
                 </div>

                  <div class="form-group row">
                    <label for="jurusan" class="col-sm-3 col-form-label text-right">Pilih Jurusan <code>*</code> : </label>
                    <div class="col-sm-6">
                       <select name="jurusan" id="jurusan" class="form-control">
                         <option value="IPA" {{$jadwal->jurusan=='IPA'?'selected':''}}>IPA</option>
                         <option value="IPS" {{$jadwal->jurusan=='IPS'?'selected':''}}>IPS</option>
                       </select>
                    </div>
                 </div>

                  <div class="form-group row">
                    <label for="postfix" class="col-sm-3 col-form-label text-right">Postfix <code>*</code> : </label>
                    <div class="col-sm-6">
                      <input type="text" name="postfix" id="postfix" value="{{$jadwal->postfix}}" class="form-control">
                    </div>
                 </div>

                 <hr>
                 <div class="row">
                   <div class="col-sm-12 text-center">
                     <button class="btn btn-primary" id="next">Submit</button>
                     <a class="btn btn-secondary" href="{{route('jadwal.index')}}">Cancel</a>
                   </div>
                 </div>

                </div>

            </div>
        </div>
      </div>

   </div>
 </section>
   
@endsection('content')

@push('after-script')
<script>
  $(document).ready(function(){
    $("#next").click(function() {
      var kelas = $("#kelas").val();
      var jurusan = $("#jurusan").val();
      var postfix = $("#postfix").val();
      var id = $("#id").val();

      if(postfix==""){
        myalert("Postfix Kelas Harus Diisi")
      }

      var url = `{{url('jadwal')}}`+'/'+id;
      $.ajax({
          url : url,
          type : "POST",
          dataType : "json",
          data    : {_token:"{{csrf_token()}}",_method:"PUT", kelas:kelas, jurusan:jurusan, postfix:postfix},
          success : function(data) {
            if(data==0){
              myalert("Kelas "+kelas+" "+jurusan+" dengan Postfix "+postfix+" sudah tersedia")
            } else {
              mySuccessAlert();
            }
          }
      });

    });

    function myalert(params) {
      Swal.fire({
        position: 'center',
        icon: 'warning',
        title: 'Maaf Proses Gagal',
        text: params,
        showConfirmButton: true
      })
    }

    function mySuccessAlert() {
      const href = `{{route('jadwal.index')}}`;
      Swal.fire({
        title: 'Sukses',
        text: "Data Berhasil Diubah",
        icon: 'success',
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.value) {
          document.location.href = href;
        }
      })
    }
  });
</script>
@endpush
