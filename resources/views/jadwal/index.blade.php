@extends('templates/main')
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
     <div class="section-header-button">
        <a href="{{route('jadwal.create')}}" class="btn btn-primary">Add New</a>
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
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Postfix</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwal as $db)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$db->kelas}}</td>
                                    <td>{{$db->jurusan}}</td>
                                    <td>{{$db->postfix}}</td>
                                    <td>
                                        <a href="{{route('jadwal.edit', $db->id)}}" class="btn btn-icon btn-sm btn-success mr-1" title="Edit" style="min-width:30px"><i class="fas fa-edit"></i></a>
                                        <a href="{{route('jadwal.destroy', $db->id)}}" class="btn btn-icon btn-sm btn-danger mr-1 tombol-hapus" title="Delete" style="min-width:30px"><i class="fas fa-trash"></i></a>
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
        $("#example").dataTable({});
      });
    </script>
@endpush