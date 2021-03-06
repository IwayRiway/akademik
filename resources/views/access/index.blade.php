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
                                 <th>Aksi</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach ($role as $db)
                                 <tr>
                                     <td>{{$loop->iteration}}</td>
                                     <td>{{$db->role->nama}}</td>
                                     <td>
                                        <a href="#mymodal" data-remote="{{route('access.show', $db->role->id)}}" data-toggle="modal" data-target="#mymodal" data-title="Menu Access : {{$db->role->nama}}" class="btn btn-icon btn-sm btn-info mr-1" title="Detail" style="min-width:30px"><i class="fas fa-info"></i></a>
                                        <a href="{{route('access.edit', $db->role->id)}}" class="btn btn-icon btn-sm btn-success mr-1" title="Edit" style="min-width:30px"><i class="fas fa-edit"></i></a>
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

 