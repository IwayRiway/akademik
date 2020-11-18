@extends('templates/main')
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
     <div class="section-header-button">
        <a href="{{route('jadwal-siswa.create')}}" class="btn btn-primary">Add New</a>
    </div>
   </div>

   <div class="section-body">

     <div class="row mb-3">
       <div class="col-sm-12">
        <ul class="nav nav-pills">
          @foreach ($kelas as $db)
            <li class="nav-item">
              <a class="nav-link kelas" href="javascript:void(0)" id="{{$db->id}}" onclick="show(`{{$db->id}}`)">{{$db->kelas}}-{{$db->jurusan}}-{{$db->postfix}}</a>
            </li>
          @endforeach
        </ul>
       </div>
     </div>

      <div class="row">
        <div class="col-sm-12">
            <div class="card card-primary">
                <div class="card-body" id="show">
                
                <div class="table-responsive">
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>NIS</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- <tr>
                      <td>1</td>
                      <td>1</td>
                      <td>Riway</td>
                      <td>Laki - Laki</td>
                      <td>
                        <a href="#mymodal" data-remote="{{route('siswa.show', 6)}}" data-toggle="modal" data-target="#mymodal" data-title="Detail Siswa : Riway" class="btn btn-icon btn-sm btn-info mr-1" title="Detail" style="min-width:30px"><i class="fas fa-info"></i></a>
                        <a href="{{route('jadwal-siswa.destroy', 6)}}" class="btn btn-icon btn-sm btn-danger mr-1 tombol-hapus" title="Delete" style="min-width:30px"><i class="fas fa-trash"></i></a>
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
 </section>

{{-- MODAL --}}
<div class="modal fade" tabindex="-1" role="dialog" id="mymodal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
         <span class="text-center">
            <i class="fa fa-spinner fa-spin"></i>
         </span>
      </div>
    </div>
  </div>
</div>
{{-- AKHIR MODAL --}}

@endsection('content')

@push('after-script')
<script>
  function show(jadwal_id) {
    $('.kelas').removeClass('active');
    $("#"+jadwal_id).addClass('active');

    var url = `{{url('jadwal-siswa')}}`+'/'+jadwal_id;
    $.ajax({
        url : url,
        type : "GET",
        dataType : "json",
        success : function(data) {
          var table = $('#example').DataTable();;
          var j = 1;
          table.clear();
          $.each(data, function (i, key) {
            var url = `{{url('jadwal-siswa/destroy')}}`+'/'+data[i].id;

            var td5 = `<a href="#mymodal" data-remote="{{url('siswa/show')}}/`+data[i].siswa_id+`" data-toggle="modal" data-target="#mymodal" data-title="Detail Siswa : `+data[i].siswa.nama+`" class="btn btn-icon btn-sm btn-info mr-1" title="Detail" style="min-width:30px"><i class="fas fa-info"></i></a>
                        <a href="javascript:void(0)" class="btn btn-icon btn-sm btn-danger mr-1" title="Delete" style="min-width:30px" onclick="hapus('`+url+`')"><i class="fas fa-trash"></i></a>`;
              table.row.add([
                  j++,
                  data[i].siswa.nis,
                  data[i].siswa.nama,
                  data[i].siswa.jenis_kelamin==1?'Laki-Laki':'Perempuan',
                  td5
              ])
          });
          table.draw();
        }
    });
  }

  function hapus(href) {
    Swal.fire({
      title: 'Yakin?',
      text: "Data ini Akan dihapus..?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yakin!',
      cancelButtonText: 'Batal'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    })
  }
</script>

<script>
    $(document).ready(function(){
      $('#example').DataTable();

      $('#mymodal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data('remote'));
            modal.find('.modal-title').html(button.data('title'));
      });

    });
</script>
@endpush