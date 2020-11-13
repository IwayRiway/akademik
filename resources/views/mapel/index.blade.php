@extends('templates.main')
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
     <div class="section-header-button">
      <a href="{{route('mapel.create')}}" class="btn btn-primary">Add New</a>
  </div>
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
                             <th>No</th>
                             <th>Nama</th>
                             <th>Aksi</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach ($mapel as $db)
                             <tr>
                                 <td>{{$loop->iteration}}</td>
                                 <td>{{$db->nama}}</td>
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

 