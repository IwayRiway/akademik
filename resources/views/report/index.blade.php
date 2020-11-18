@extends('templates/main')
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
     <div class="section-header-button">
        <a href="{{route('report.create')}}" class="btn btn-primary">Add New</a>
    </div>
   </div>

   <div class="section-body">

     <div class="row mb-3">
       <div class="col-sm-12">
        <ul class="nav nav-pills">
          @foreach ($mapel as $db)
            <li class="nav-item">
              <a class="nav-link kelas" href="javascript:void(0)" id="{{$db->mapel_id}}" onclick="show(`{{$db->mapel_id}}`)">{{$db->mapel->nama}}</a>
            </li>
          @endforeach
        </ul>
       </div>
     </div>

     @foreach ($kelas as $db)
      <div class="row hilang" id="row{{$db->id}}">
        <div class="col-sm-12">
          <div class="card card-primary">
            <div class="card-header">
              <h4>{{$db->kelas}}-{{$db->jurusan}}-{{$db->postfix}}</h4>
              <div class="card-header-action">
                <a data-collapse="#mycard-collapse{{$db->id}}" class="btn btn-icon btn-info" href="#"><i class="fas fa-plus"></i></a>
              </div>
            </div>
            <div class="collapse" id="mycard-collapse{{$db->id}}">
              <div class="card-body">
                <div class="table-responsive">
                  <table id="table_{{$db->id}}" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Nilai</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      {{-- <tr>
                        <td>1</td>
                        <td>1</td>
                        <td>Riway</td>
                        <td>Laki - Laki</td>
                        <td>
                          <a href="#mymodal" data-remote="{{route('siswa.show', 6)}}" data-toggle="modal" data-target="#mymodal" data-title="Detail Siswa : Riway" class="btn btn-icon btn-sm btn-success mr-1" title="Detail" style="min-width:30px"><i class="fas fa-edit"></i></a>
                        </td>
                      </tr> --}}
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     @endforeach

   </div>
 </section>

   
@endsection('content')

@push('after-script')
<script>
function show(mapel_id) {
    $('.kelas').removeClass('active');
    $("#"+mapel_id).addClass('active');

    var url = `{{url('report/report')}}`+'/'+mapel_id;
    $.ajax({
        url : url,
        type : "GET",
        dataType : "json",
        success : function(data) {
          // var table = $('#example').DataTable();;
          // var j = 1;
          // table.clear();
          $.each(data.kelas, function (i, key) {
            var kelas_id = data.kelas[i];
            $('#row'+kelas_id).removeClass('hilang');
            var r = 1;
            $.each(data.siswa[kelas_id], function (j, key2) {
                var table = $('#table_'+kelas_id).DataTable();

                var td5 = `<a href="#mymodal" data-remote="{{url('siswa/show')}}/`+data.siswa[kelas_id][j].id+`" data-toggle="modal" data-target="#mymodal" data-title="Detail Siswa : `+data.siswa[kelas_id][j].nama+`" class="btn btn-icon btn-sm btn-success mr-1" title="Detail" style="min-width:30px"><i class="fas fa-info"></i></a>`;

                table.row.add([
                    r++,
                    data.siswa[kelas_id][j].nama,
                    data.siswa[kelas_id][j].jenis_kelamin==1?'Laki-Laki':'Perempuan',
                    data.siswa[kelas_id][j].nilai??"-",
                    td5
                ]);
                table.draw();
            });

          });
          
        }
    });
  }
</script>

<script>
    $(document).ready(function(){
      $('#example').DataTable();
    });
</script>
 @endpush