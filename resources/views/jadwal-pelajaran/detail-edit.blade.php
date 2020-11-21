<div class="row">
  <div class="col-sm-12">

  <input type="hidden" name="update_id" id="update_id" value="{{$detail->id}}">
  <div class="form-group row">
    <label for="mapel_id" class="col-sm-5 col-form-label text-left">Pilih Mata Pelajaran <code>*</code> : </label>
    <div class="col-sm-7">
        <select name="mapel_id" id="mapel_id" class="form-control mapel_id">
          <option></option>
          @foreach ($mapel as $db)
            @if ($db->id == $detail->mapel_id)
            <option value="{{$db->id}}" selected>{{$db->nama}}</option>
            @else
            <option value="{{$db->id}}">{{$db->nama}}</option>
            @endif
          @endforeach
            <option value="0" {{$detail->mapel_id=='0'?'selected':''}}>Istirahat</option>
            <option value="00" {{$detail->mapel_id=='00'?'selected':''}}>Upacara</option>
        </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="guru_id" class="col-sm-5 col-form-label text-left">Pilih Guru Pengajar <code>*</code> : </label>
    <div class="col-sm-7">
        <select name="guru_id" id="guru_id" class="form-control guru_id">
          <option></option>
          @foreach ($guru as $db)
            @if ($db->id == $detail->guru_id)
            <option value="{{$db->id}}" selected>{{$db->nama}}</option>
            @else
            <option value="{{$db->id}}">{{$db->nama}}</option>
            @endif
          @endforeach
        </select>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12 text-right">
      <button class="btn btn-primary" id="submit">Save</button>
      <button class="btn btn-danger" id="delete">Delete</button>
    </div>
  </div>

  </div>
</div>

<script>
  $(document).ready(function(){
    $(".mapel_id").select2({
        placeholder: "Pilih Mata Pelajaran",
        allowClear: true
    });
    
    $(".guru_id").select2({
        placeholder: "Pilih Guru Pengajar",
        allowClear: true
    });

    $("#submit").click(function(){
      var mapel_id = $("#mapel_id").val();
      var guru_id = $("#guru_id").val();
      var id = $("#td_id").val();
      var update_id = $("#update_id").val();
      
      var url = `{{url('jadwal-pelajaran')}}`+'/'+update_id;
      $.ajax({
          url : url,
          type : "POST",
          dataType : "json",
          data    : {_token:"{{csrf_token()}}",_method:"PUT", mapel_id:mapel_id, guru_id:guru_id},
          success : function(data) {
            console.log(data.guru.nama);
            var html = `
                        <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+update_id+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : Senin, `+data.jam.jam_awal+` - `+data.jam.jam_akhir+`" data-jadwal_id="`+data.jadwal_id+`" data-id="`+data.hari+``+data.jam_pelajaran_id+`">
                          `+data.mapel.nama+`
                          <hr style="margin: 0px; border: 1px solid black;">
                          `+data.guru.nama+`
                        </a>`;
            $('#'+id).html(html);
            $('#mymodal').modal('hide');
          }
      });
    });

    $("#delete").click(function(){
      // alert("MASUK");
      var id = $("#td_id").val();
      var update_id = $("#update_id").val();
      var text = "";
      var url = `{{url('jadwal-pelajaran')}}`+'/'+update_id;
      $.ajax({
          url : url,
          type : "POST",
          dataType : "json",
          data    : {_token:"{{csrf_token()}}",_method:"DELETE"},
          success : function(data) {
            var html = `
                        <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/0`+id+`" data-toggle="modal" data-target="#mymodal" data-title="Edit Jadwal : `+data.hari+`, `+data.jam_awal+` - `+data.jam_akhir+`" data-jadwal_id="`+data.jadwal_id+`" data-id="`+id+`">
                          `+text+`
                          <hr style="margin: 0px; border: 1px solid black;">
                          `+text+`
                        </a>`;
            $('#'+id).html(html);
            $('#mymodal').modal('hide');
          }
      });
    });

  });
</script>