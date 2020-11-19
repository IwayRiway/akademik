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
               <form action="{{route('access.store')}}" method="post" enctype="multipart/form-data">
                 <div class="card-body">

                     @csrf
                     <div class="form-group row">
                        <label for="role" class="col-sm-2 col-form-label">Pilih Role <code>*</code> : </label>
                        <div class="col-sm-6">
                           <select name="role" id="role" class="form-control role" required>
                             <option></option>
                             @foreach ($role as $db)
                              <option value="{{$db->id}}">{{$db->nama}}</option>
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
                              <th>Menu Akses</th>
                              <th>URL</th>
                            </tr>
                          </thead>
                          <tbody>
                           @foreach ($menu as $db)
                            <tr>
                              <td>
                                <div class="custom-checkbox custom-control">
                                  <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-all{{$db->id}}" name="menu_id[]" value="{{$db->id}}">
                                  <label for="checkbox-all{{$db->id}}" class="custom-control-label">&nbsp;</label>
                                </div>
                              </td>
                              <td>{{$db->nama}}</td>
                              <td>{{$db->url}}</td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                       </div>

                 </div>

                 <div class="card-footer text-center">
                     <button class="btn btn-primary mr-1" type="submit">Submit</button>
                     <a href="{{route('access.index')}}" class="btn btn-secondary">Cancel</a>
                  </div>
               </form>

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
   $('#table-2').DataTable();

    $("#role").select2({
        placeholder: "Pilih Role Access",
        allowClear: true
    });

    $("#checkbox-all").click(function(){
      $('input:checkbox').not(this).prop('checked', this.checked);
    });


  });
</script>
@endpush