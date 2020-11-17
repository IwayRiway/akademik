@extends('templates/main')
@push('style')
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
       function show(id) {
        var url = `{{url('jadwal-pelajaran')}}`+'/'+id;
        $.ajax({
          url : url,
          type : "GET",
          dataType : "json",
          success : function(data) {
            $('#show').empty();
            var loop = 0;

            var data_senin = data.senin.length;
            var data_selasa = data.selasa.length;
            var data_rabu = data.rabu.length;
            var data_kamis = data.kamis.length;
            var data_jumat = data.jumat.length;
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
                      
                      if(data_senin<=0){
                        var id_senin = "01"+data.jam[i].id;
                        var mapel_senin = "";
                        var guru_senin = "";
                      } else {
                        var id_senin = data.senin[data.jam[i].id].id;
                        var mapel_senin = data.senin[data.jam[i].id].mapel??"";
                        var guru_senin = data.senin[data.jam[i].id].guru??"";
                      }

                      if(data_selasa<=0){
                        var id_selasa = "02"+data.jam[i].id;
                        var mapel_selasa = "";
                        var guru_selasa = "";
                      } else {
                        var id_selasa = data.selasa[data.jam[i].id].id;
                        var mapel_selasa = data.selasa[data.jam[i].id].mapel??"";
                        var guru_selasa = data.selasa[data.jam[i].id].guru??"";
                      }

                      if(data_rabu<=0){
                        var id_rabu = "03"+data.jam[i].id;
                        var mapel_rabu = "";
                        var guru_rabu = "";
                      } else {
                        var id_rabu = data.rabu[data.jam[i].id].id;
                        var mapel_rabu = data.rabu[data.jam[i].id].mapel??"";
                        var guru_rabu = data.rabu[data.jam[i].id].guru??"";
                      }

                      if(data_kamis<=0){
                        var id_kamis = "04"+data.jam[i].id;
                        var mapel_kamis = "";
                        var guru_kamis = "";
                      } else {
                        var id_kamis = data.kamis[data.jam[i].id].id;
                        var mapel_kamis = data.kamis[data.jam[i].id].mapel??"";
                        var guru_kamis = data.kamis[data.jam[i].id].guru??"";
                      }

                      if(data_jumat<=0){
                        var id_jumat = "05"+data.jam[i].id;
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
                      
                      html+=`  <td>
                                <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+id_senin+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, `+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`">
                                  `+mapel_senin+`
                                  <hr style="margin: 0px; border: 1px solid black;">
                                  `+guru_senin+`
                                </a>
                              </td>
                              <td>
                                <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+id_selasa+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, `+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`">
                                  `+mapel_selasa+`
                                  <hr style="margin: 0px; border: 1px solid black;">
                                  `+guru_selasa+`
                                </a>
                              </td>
                              <td>
                                <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+id_rabu+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, `+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`">
                                  `+mapel_rabu+`
                                  <hr style="margin: 0px; border: 1px solid black;">
                                  `+guru_rabu+`
                                </a>
                              </td>
                              <td>
                                <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+id_kamis+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, `+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`">
                                  `+mapel_kamis+`
                                  <hr style="margin: 0px; border: 1px solid black;">
                                  `+guru_kamis+`
                                </a>
                              </td>
                              <td>
                                <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+id_jumat+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, `+data.jam[i].jam_awal+` - `+data.jam[i].jam_akhir+`">
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
     </script>
 @endpush