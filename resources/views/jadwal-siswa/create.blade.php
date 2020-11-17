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
                  <form action="{{route('jadwal-siswa.store')}}" method="post">
                    @csrf
                    
                    <div class="form-group row">
                      <label for="kelas" class="col-sm-2 col-form-label">Pilih Kelas <code>*</code> : </label>
                      <div class="col-sm-6">
                         <select name="kelas" id="kelas" class="form-control kelas">
                           <option></option>
                           @foreach ($jadwal as $db)
                            <option value="{{$db->id}}">{{$db->kelas}}-{{$db->jurusan}}-{{$db->postfix}}</option>
                           @endforeach
                         </select>
                      </div>
                   </div>
                   <input type="hidden" name="jadwal_id" id="jadwal_id">
                   <hr style="border: 1px solid black">

                   <div class="table-responsive">
                    <table class="table table-striped" id="table-2">
                      <thead>
                        <tr>
                          <th>
                            <div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                              <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                            </div>
                          </th>
                          <th>NIS</th>
                          <th>Nama</th>
                          <th>Jenis Kelamin</th>
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
                      <button class="btn btn-primary hilang" type="submit" id="submit">Submit</button>
                      <a class="btn btn-secondary" href="{{route('jadwal-siswa.index')}}">Cancel</a>
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

  $(document).ready(function(){
    var table = $('#table-2').DataTable();

    $("#kelas").select2({
        placeholder: "Pilih Kelas",
        allowClear: true
    });

    $('#kelas').on('change', function() {
        var val = this.value;
        var kelas = $(this).find('option:selected').text();

        $.ajax({
          url : `{{route('jadwal-siswa.siswa')}}`,
          type : "POST",
          dataType : "json",
          data    : {_token:"{{csrf_token()}}", kelas:kelas},
          success : function(data) {
            $('#jadwal_id').val(val);

            table.clear();
            $.each(data, function (i, key) {
              var td1 = `<div class="custom-checkbox custom-control">
                              <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-`+data[i].id+`" name='siswa_id[]' value="`+data[i].id+`">
                              <label for="checkbox-`+data[i].id+`" class="custom-control-label">&nbsp;</label>
                            </div>`;
                table.row.add([
                    td1,
                    data[i].nis,
                    data[i].nama,
                    data[i].jenis_kelamin==1?'Laki-Laki':'Perempuan'
                ])
            });
            table.draw();
            $('#submit').removeClass('hilang');
          }
      });
    });

    $("#checkbox-all").click(function(){
      $('input:checkbox').not(this).prop('checked', this.checked);
    });


  });
</script>
@endpush
