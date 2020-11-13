@extends('templates.main')
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
   </div>

   <div class="section-body">

      <div class="row">
         <div class="col-sm-12">
             <div class="card card-primary">
                 <div class="card-body">
                 
                 <div class="table-responsive">
                 <table id="example" class="table table-striped table-bordered" style="width:100%">
                     <thead>
                         <tr>
                             <th>Nis</th>
                             <th>Nama</th>
                             <th>Jenis Kelamin</th>
                             <th>Kelas</th>
                             <th>Jurusan</th>
                             <th>Kategori</th>
                             <th>Tipe</th>
                             <th>Aktif</th>
                             <th>Detail</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($siswa as $db)
                             <tr>
                                 <td>{{$db->nis}}</td>
                                 <td>{{$db->nama}}</td>
                                 <td>{{$db->jenis_kelamin==1?'Laki-Laki':'Perempuan'}}</td>
                                 <td>{{$db->kelas}}</td>
                                 <td>{{$db->jurusan}}</td>
                                 <td>{{ucwords($db->kategori)}}</td>
                                 <td>{{$db->tipe==1?'Fullday':'Boarding'}}</td>
                                 <td><i class="fas fa-square {{$db->aktif==1?'text-success':'text-danger'}}"></i></td>
                                 <td>
                                     <a href="#mymodal" data-remote="{{route('siswa.show', $db->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Detail Siswa : {{$db->nama}}" class="btn btn-icon btn-sm btn-info mr-1" title="Detail" style="min-width:30px"><i class="fas fa-info"></i></a>
                                 </td>
                             </tr>
                          @endforeach
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

 