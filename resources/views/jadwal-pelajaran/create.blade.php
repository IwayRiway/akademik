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

                <div class="card-body" id="jadwal">

                  <div class="form-group row">
                    <label for="kelas" class="col-sm-3 col-form-label text-right">Pilih Kelas <code>*</code> : </label>
                    <div class="col-sm-6">
                       <select name="kelas" id="kelas" class="form-control">
                         <option value="X">X</option>
                         <option value="XI">XI</option>
                         <option value="XII">XII</option>
                       </select>
                    </div>
                 </div>

                  <div class="form-group row">
                    <label for="jurusan" class="col-sm-3 col-form-label text-right">Pilih Jurusan <code>*</code> : </label>
                    <div class="col-sm-6">
                       <select name="jurusan" id="jurusan" class="form-control">
                         <option value="IPA">IPA</option>
                         <option value="IPS">IPS</option>
                       </select>
                    </div>
                 </div>

                  <div class="form-group row">
                    <label for="postfix" class="col-sm-3 col-form-label text-right">Postfix <code>*</code> : </label>
                    <div class="col-sm-6">
                      <input type="text" name="postfix" id="postfix" value="" class="form-control">
                    </div>
                 </div>

                 <hr>
                 <div class="row">
                   <div class="col-sm-12 text-center">
                     <button class="btn btn-primary" id="next">Next</button>
                     <a class="btn btn-secondary" href="{{route('jadwal-pelajaran.index')}}">Cancel</a>
                   </div>
                 </div>

                </div>

                <div class="card-body hilang" id="jadwal-guru">
                    <table class="table table-bordered table-hover">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Jam Pelajaran</th>
                            <th>Mata Pelajaran</th>
                            <th>Guru</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($jam as $db)
                              <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$db->jam_awal}} - {{$db->jam_akhir}}</td>
                                <td>
                                  <select class="form-control mapel_id" name="mapel_id_{{$db->id}}" id="mapel_id_{{$db->id}}" style="width: 100%">
                                    <option></option>
                                    @foreach ($mapel as $db1)
                                      <option value="{{$db1->id}}">{{$db1->nama}}</option>
                                    @endforeach
                                    <option value="00">Upacara</option>
                                    <option value="0">Istirahat</option>
                                  </select>
                                </td>
                                <td>
                                  <select class="form-control guru_id" name="guru_id_{{$db->id}}" id="guru_id_{{$db->id}}" style="width: 100%">
                                    <option></option>
                                    @foreach ($guru as $db2)
                                      <option value="{{$db2->id}}">{{$db2->nama}}</option>
                                    @endforeach
                                  </select>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                    </table>
                    <hr style="border: 1px solid black">
                    <div class="form-group row">
                      <label for="hari" class="col-sm-3 col-form-label text-right">Pilih Hari <code>*</code> : </label>
                      <div class="col-sm-6">
                         <select name="hari" id="hari" class="form-control select2">
                           <option></option>
                           <option value="1">Senin</option>
                           <option value="2">Selasa</option>
                           <option value="3">Rabu</option>
                           <option value="4">Kamis</option>
                           <option value="5">Jumat</option>
                         </select>
                      </div>
                   </div>

                   <div class="row">
                     <div class="col-sm-12 text-center">
                      <button class="btn btn-primary hilang" type="submit" id="submit">Submit</button>
                      <a class="btn btn-secondary" href="{{route('jadwal-pelajaran.index')}}">Cancel</a>
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
<script src="{{asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $(".mapel_id").select2({
        placeholder: "Pilih Mata Pelajaran",
        allowClear: true
    });

    $(".guru_id").select2({
        placeholder: "Pilih Guru Pengajar",
        allowClear: true
    });

    $("#hari").select2({
        placeholder: "Pilih Hari Penjadwalan",
        allowClear: true
    });

    $("#next").click(function() {
      var kelas = $("#kelas").val();
      var jurusan = $("#jurusan").val();
      var postfix = $("#postfix").val();

      if(postfix==""){
        myalert("Postfix Kelas Harus Diisi")
      }

      $.ajax({
          url : `{{route('jadwal-pelajaran.jadwal')}}`,
          type : "POST",
          dataType : "json",
          data    : {_token:"{{csrf_token()}}", kelas:kelas, jurusan:jurusan, postfix:postfix},
          success : function(data) {
            if(data==0){

            } else {
              myalert("Kelas "+kelas+" "+jurusan+" dengan Postfix "+postfix+" sudah tersedia")
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

  });
</script>
@endpush
