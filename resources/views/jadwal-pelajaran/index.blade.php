@extends('templates/main')
@push('style')
<link rel="stylesheet" href="{{asset('assets/modules/select2/dist/css/select2.min.css')}}">

    <style>
      td a {
          color: black;
          display:block;
          width:100%;
      }
    </style>
@endpush
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
     <div class="section-header-button">
        <a href="{{route('jadwal-pelajaran.create')}}" class="btn btn-primary">Add New</a>
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

                {{-- <table class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>No.</th>
                      <th>Jam Pelajaran</th>
                      <th>Senin</th>
                      <th>Selasa</th>
                      <th>Rabu</th>
                      <th>Kamis</th>
                      <th>Jumat</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>1</td>
                      <td>
                        <a href="#mymodal" data-remote="{{route('jadwal-pelajaran.detail', 1)}}" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, Jam">
                          B.Indonesia
                          <hr style="margin: 0px; border: 1px solid black;">
                          Riway Restu Islami Yudha
                        </a>
                      </td>
                      <td>
                        <a href="#mymodal" data-remote="{{route('jadwal-pelajaran.detail', 1)}}" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, Jam">
                          B.Indonesia
                          <hr style="margin: 0px; border: 1px solid black;">
                          Riway Restu Islami Yudha
                        </a>
                      </td>
                      <td>
                        <a href="#mymodal" data-remote="{{route('jadwal-pelajaran.detail', 1)}}" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, Jam">
                          B.Indonesia
                          <hr style="margin: 0px; border: 1px solid black;">
                          Riway Restu Islami Yudha
                        </a>
                      </td>
                      <td>
                        <a href="#mymodal" data-remote="{{route('jadwal-pelajaran.detail', 1)}}" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, Jam">
                          B.Indonesia
                          <hr style="margin: 0px; border: 1px solid black;">
                          Riway Restu Islami Yudha
                        </a>
                      </td>
                      <td>
                        <a href="#mymodal" data-remote="{{route('jadwal-pelajaran.detail', 1)}}" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, Jam">
                          B.Indonesia
                          <hr style="margin: 0px; border: 1px solid black;">
                          Riway Restu Islami Yudha
                        </a>
                      </td>
                    </tr>
                  </tbody>
                </table> --}}

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
      <div class="modal-body">
         <span class="text-center">
            <i class="fa fa-spinner fa-spin"></i>
         </span>
      </div>
      <input type="hidden" name="td_id" id="td_id" class="td_id">
      <input type="hidden" name="jadwal_id" id="jadwal_id" class="td_id">
    </div>
  </div>
</div>
{{-- AKHIR MODAL --}}
   
@endsection('content')

 @push('after-script')
 <script src="{{asset('assets/modules/select2/dist/js/select2.full.min.js')}}"></script>

     <script>
       function show(id) {
        $('.kelas').removeClass('active');
        $("#"+id).addClass('active');

        var jadwal_id = id;
        var url = `{{url('jadwal-pelajaran')}}`+'/'+id;
        $.ajax({
          url : url,
          type : "GET",
          dataType : "json",
          success : function(data) {
            $('#show').empty();
            var loop = 0;
            var data_jam = data.jam.length;

            var html = `<table class="table table-bordered table-hover">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Jam Pelajaran</th>
                              <th>Senin</th>
                              <th>Selasa</th>
                              <th>Rabu</th>
                              <th>Kamis</th>
                              <th>Jumat</th>
                            </tr>
                          </thead>
                          <tbody>`;

                      for (let i = 0; i < data_jam; i++) {
                      loop++;
                      var id_senin = "01"+data.jam[i].id;
                      var id_selasa = "02"+data.jam[i].id;
                      var id_rabu = "03"+data.jam[i].id;
                      var id_kamis = "04"+data.jam[i].id;
                      var id_jumat = "05"+data.jam[i].id;

                      if(data.jam[i].id in data.senin == false){
                        var mapel_senin = "";
                        var guru_senin = "";
                      } else {
                        var id_senin = data.senin[data.jam[i].id].id;
                        var mapel_senin = data.senin[data.jam[i].id].mapel??"";
                        var guru_senin = data.senin[data.jam[i].id].guru??"";
                      }

                      if(data.jam[i].id in data.selasa == false){
                        var mapel_selasa = "";
                        var guru_selasa = "";
                      } else {
                        var id_selasa = data.selasa[data.jam[i].id].id;
                        var mapel_selasa = data.selasa[data.jam[i].id].mapel??"";
                        var guru_selasa = data.selasa[data.jam[i].id].guru??"";
                      }

                      if(data.jam[i].id in data.rabu == false){
                        var mapel_rabu = "";
                        var guru_rabu = "";
                      } else {
                        var id_rabu = data.rabu[data.jam[i].id].id;
                        var mapel_rabu = data.rabu[data.jam[i].id].mapel??"";
                        var guru_rabu = data.rabu[data.jam[i].id].guru??"";
                      }

                      if(data.jam[i].id in data.kamis == false){
                        var mapel_kamis = "";
                        var guru_kamis = "";
                      } else {
                        var id_kamis = data.kamis[data.jam[i].id].id;
                        var mapel_kamis = data.kamis[data.jam[i].id].mapel??"";
                        var guru_kamis = data.kamis[data.jam[i].id].guru??"";
                      }

                      if(data.jam[i].id in data.jumat == false){
                        var mapel_jumat = "";
                        var guru_jumat = "";
                      } else {
                        var id_jumat = data.jumat[data.jam[i].id].id;
                        var mapel_jumat = data.jumat[data.jam[i].id].mapel??"";
                        var guru_jumat = data.jumat[data.jam[i].id].guru??"";
                      }

                      html+=`<tr>
                              <td>`+loop+`</td>
                              <td>`+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`</td>`;
                      
                      html+=`  <td id="`+1+``+data.jam[i].id+`">
                                <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+id_senin+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, `+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`" data-jadwal_id="`+jadwal_id+`" data-id="`+1+``+data.jam[i].id+`">
                                  `+mapel_senin+`
                                  <hr style="margin: 0px; border: 1px solid black;">
                                  `+guru_senin+`
                                </a>
                              </td>
                              <td id="`+2+``+data.jam[i].id+`">
                                <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+id_selasa+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Selasa, `+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`" data-jadwal_id="`+jadwal_id+`" data-id="`+2+``+data.jam[i].id+`">
                                  `+mapel_selasa+`
                                  <hr style="margin: 0px; border: 1px solid black;">
                                  `+guru_selasa+`
                                </a>
                              </td>
                              <td id="`+3+``+data.jam[i].id+`">
                                <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+id_rabu+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Rabu, `+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`" data-jadwal_id="`+jadwal_id+`" data-id="`+3+``+data.jam[i].id+`">
                                  `+mapel_rabu+`
                                  <hr style="margin: 0px; border: 1px solid black;">
                                  `+guru_rabu+`
                                </a>
                              </td>
                              <td id="`+4+``+data.jam[i].id+`">
                                <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+id_kamis+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Kamis, `+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`" data-jadwal_id="`+jadwal_id+`" data-id="`+4+``+data.jam[i].id+`">
                                  `+mapel_kamis+`
                                  <hr style="margin: 0px; border: 1px solid black;">
                                  `+guru_kamis+`
                                </a>
                              </td>
                              <td id="`+5+``+data.jam[i].id+`">
                                <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+id_jumat+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Jumat, `+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`" data-jadwal_id="`+jadwal_id+`" data-id="`+5+``+data.jam[i].id+`">
                                  `+mapel_jumat+`
                                  <hr style="margin: 0px; border: 1px solid black;">
                                  `+guru_jumat+`
                                </a>
                              </td>
                            </tr>`;
                      }
                    html+=`</tbody>
                        </table>`;

              $("#show").html(html);
          }
      });
    }

    $(document).ready(function(){
      $('#mymodal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data('remote'));
            modal.find('.modal-title').html(button.data('title'));
            modal.find('#td_id').val(button.data('id'));
            modal.find('#jadwal_id').val(button.data('jadwal_id'));
      });

    });
     </script>
 @endpush