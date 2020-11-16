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

                <div class="card-body " id="jadwal-guru">
                  <form action="{{route('jadwal-pelajaran.store')}}" method="post">
                    @csrf
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
                      <label for="kelas" class="col-sm-3 col-form-label text-right">Pilih Kelas <code>*</code> : </label>
                      <div class="col-sm-6">
                         {{-- <select name="kelas" id="kelas" class="form-control kelas" onchange="name(this)"> --}}
                         <select name="kelas" id="kelas" class="form-control kelas">
                           <option></option>
                           @foreach ($jadwal as $db)
                            <option value="{{$db->id}}">{{$db->kelas}}-{{$db->jurusan}}-{{$db->postfix}}</option>
                           @endforeach
                         </select>
                      </div>
                   </div>

                    <div class="form-group row">
                      <label for="hari" class="col-sm-3 col-form-label text-right">Pilih Hari <code>*</code> : </label>
                      <div class="col-sm-6">
                         <select name="hari" id="hari" class="form-control select2" onchange="hari(this.value)">
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
                  </form>
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
  // function kelas(val) {
    // var hari = $('#hari').val();
    // if(val!="" && hari!=""){
    //   cekJadwal(val,hari);
    // } else {
    //   $("#submit").addClass('hilang');
    // }
  // }

  // function hari(val) {
  //   var kelas = $('#kelas').val();
  //   if(val!="" && kelas!=""){
  //     cekJadwal(kelas,val);
  //   } else {
  //     $("#submit").addClass('hilang');
  //     myalert("Anda Harus Memilih Hari dan Kelas");
  //   }
  // }

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

    $("#kelas").select2({
        placeholder: "Pilih Kelas",
        allowClear: true
    });

    $('#kelas').on('change', function() {
        var val = this.value;
        var hari = $('#hari').val();
        if(val!="" && hari!=""){
          cekJadwal(val,hari);
        } else {
          $("#submit").addClass('hilang');
        }
    });

    $('#hari').on('change', function() {
        var val = this.value;
        var kelas = $('#kelas').val();
        if(val!="" && kelas!=""){
          cekJadwal(kelas,val);
        } else {
          $("#submit").addClass('hilang');
        }
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

    function cekJadwal(kelas,hari) {
      $.ajax({
          url : `{{route('jadwal-pelajaran.jadwal')}}`,
          type : "POST",
          dataType : "json",
          data    : {_token:"{{csrf_token()}}", jadwal_id:kelas, hari:hari},
          success : function(data) {
            if(data==0){
              $("#submit").addClass('hilang');
              myalert("Jadwal sudah tersedia");
            } else {
              $("#submit").removeClass('hilang');
            }
          }
      });
    }

  });
</script>
@endpush
