@extends('templates/main')
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
     <div class="section-header-button">
         <a href="{{route('access.create')}}" class="btn btn-primary">Add New</a>
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
                                 <th>Role</th>
                                 <th>Menu Akses</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($role as $db)
                                 <tr>
                                     <td>{{$loop->iteration}}</td>
                                     <td>{{$db->role->nama}}</td>
                                     <td>{{$db->menu->nama}}</td>
                                     <td>
                                         <a href="{{route('access.destroy', $db->id)}}" class="btn btn-icon btn-sm btn-danger mr-1 tombol-hapus" title="Delete" style="min-width:30px"><i class="fas fa-trash"></i></a>
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
       });
    </script>
@endpush

 