@extends('templates/main')
@push('style')
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.css')}}">
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
                  <form action="{{route('report.store')}}" method="post">
                    @csrf
                    
                    <div class="form-group row">
                      <label for="mapel" class="col-sm-2 col-form-label">Pilih Mata Pelajaran <code>*</code> : </label>
                      <div class="col-sm-6">
                         <select name="mapel" id="mapel" class="form-control mapel">
                           <option></option>
                           @foreach ($mapel as $db)
                            <option value="{{$db->mapel->id}}">{{$db->mapel->nama}}</option>
                           @endforeach
                         </select>
                      </div>
                   </div>
                    
                    <div class="form-group row">
                      <label for="kelas" class="col-sm-2 col-form-label">Pilih Kelas <code>*</code> : </label>
                      <div class="col-sm-6">
                         <select name="kelas" id="kelas" class="form-control kelas">
                           <option></option>
                         </select>
                      </div>
                   </div>
                    
                    <div class="form-group row">
                      <label for="jenis" class="col-sm-2 col-form-label">Pilih Jenis Nilai <code>*</code> : </label>
                      <div class="col-sm-3">
                         <select name="jenis" id="jenis" class="form-control select2">
                           <option value="1">Harian</option>
                           <option value="2">Tengah Semester</option>
                           <option value="3">Akhir Semester</option>
                         </select>
                      </div>
                      <div class="col-sm-3">
                         <input type="text" name="tanggal_ujian" id="tanggal_ujian" class="form-control datepicker">
                      </div>
                      <div class="col-sm-2">
                        <button class="btn btn-primary" type="button" id="show">Show</button>
                      </div>
                   </div>
                   <hr style="border: 1px solid black">

                   <div class="table-responsive">
                    <table class="table table-striped" id="table-2">
                      <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
                          <th>Nilai</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- <tr>
                          <td>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </td>
                          <td>Create a mobile app</td>
                          <td>Create a mobile app</td>
                          <td>Create a mobile app</td>
                        </tr> --}}
                      </tbody>
                    </table>
                   </div>

                   <div class="row">
                     <div class="col-sm-12 text-center">
                      <button class="btn btn-primary" type="submit" id="submit">Submit</button>
                      <a class="btn btn-secondary" href="{{route('report.index')}}">Cancel</a>
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
<script src="{{asset('assets/modules/cleave-js/dist/cleave.min.js')}}"></script>
<script src="{{asset('assets/modules/cleave-js/dist/addons/cleave-phone.us.js')}}"></script>
<script src="{{asset('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')}}"></script>
<script src="{{asset('assets/modules/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>
<script>

  $(document).ready(function(){
    var table = $('#table-2').DataTable();

    $("#kelas").select2({
        placeholder: "Pilih Kelas",
        allowClear: true
    });

    $("#mapel").select2({
        placeholder: "Pilih Mata Pelajaran",
        allowClear: true
    });

    $('#mapel').on('change', function() {
        var val = this.value;
        $('#kelas').empty();
        $.ajax({
            url : `{{route('report.kelas')}}`,
            type : "POST",
            dataType : "json",
            data    : {_token:"{{csrf_token()}}", mapel_id:val},
            success : function(data) {
              $.each(data, function (i, key) {
                  var text = data[i].jadwal['kelas']+'-'+data[i].jadwal['jurusan']+'-'+data[i].jadwal['postfix'];
                  var newOption = new Option(text, data[i].jadwal['id'], false, false);
                  $('#kelas').append(newOption).trigger('change');
              });
            }
        });
    });

    $('#show').click(function(){
        var jadwal_id = $('#kelas').val();
        var tanggal_ujian = $('#tanggal_ujian').val();

        $.ajax({
            url : `{{route('report.siswa')}}`,
            type : "POST",
            dataType : "json",
            data    : {_token:"{{csrf_token()}}", jadwal_id:jadwal_id, tanggal_ujian:tanggal_ujian},
            success : function(data) {
              var r = 1;
              table.clear();
              $.each(data, function (i, key) {
                var td4 = `<input type="hidden" name="siswa_id[]" value="`+data[i].siswa.id+`">
                           <input type="number" max="100" min="0" name="nilai_`+data[i].siswa.id+`" id="nilai_`+data[i].siswa.id+`" class="form-control">`;
                table.row.add([
                    r++,
                    data[i].siswa.nama,
                    data[i].siswa.jenis_kelamin==1?'Laki-Laki':'Perempuan',
                    td4
                ]);
                table.draw();
              });
            }
        });

    });


  });
</script>
@endpush
