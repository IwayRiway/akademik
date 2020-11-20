@extends('templates/main')
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
     <div class="section-header-button">
         <a href="{{route('user.create')}}" class="btn btn-primary">Add New</a>
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
                                 <th>Username</th>
                                 <th>Email</th>
                                 <th>Role</th>
                                 <th>Tipe User</th>
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($user as $db)
                                 <tr>
                                     <td>{{$loop->iteration}}</td>
                                     <td>{{$db->nama}}</td>
                                     <td>{{$db->username}}</td>
                                     <td>{{$db->email}}</td>
                                     <td>{{$db->role->nama}}</td>
                                     <td>@php
                                         if ($db->tipe_user==1) {
                                             echo "Umum";
                                         }
                                         if ($db->tipe_user==2) {
                                            echo "Guru";
                                         }
                                         if ($db->tipe_user==3) {
                                            echo "Siswa";
                                         }
                                     @endphp</td>
                                     <td>
                                         <a href="{{route("user.edit", $db->id_user)}}" class="btn btn-icon btn-sm btn-success mr-1" title="Edit" style="min-width:30px"><i class="fas fa-edit"></i></a>
                                         <a href="{{route("user.destroy", $db->id_user)}}" class="btn btn-icon btn-sm btn-danger mr-1 tombol-hapus" title="Delete" style="min-width:30px"><i class="fas fa-trash"></i></a>
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

 