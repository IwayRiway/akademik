<div class="row">
  <div class="col-sm-12">

  <div class="form-group row">
    <label for="mapel_id" class="col-sm-5 col-form-label text-left">Pilih Mata Pelajaran <code>*</code> : </label>
    <div class="col-sm-7">
        <select name="mapel_id" id="mapel_id" class="form-control mapel_id">
          <option></option>
          @foreach ($mapel as $db)
            <option value="{{$db->id}}">{{$db->nama}}</option>
          @endforeach
            <option value="0">Istirahat</option>
            <option value="00">Upacara</option>
        </select>
    </div>
  </div>

  <div class="form-group row">
    <label for="guru_id" class="col-sm-5 col-form-label text-left">Pilih Guru Pengajar <code>*</code> : </label>
    <div class="col-sm-7">
        <select name="guru_id" id="guru_id" class="form-control guru_id">
          <option></option>
          @foreach ($guru as $db)
            <option value="{{$db->id}}">{{$db->nama}}</option>
          @endforeach
        </select>
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12 text-right">
      <button class="btn btn-primary" id="submit">Submit</button>
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
      var jadwal_id = $("#jadwal_id").val();
      
      $.ajax({
          url : `{{route('jadwal-pelajaran.store-detail')}}`,
          type : "POST",
          dataType : "json",
          data    : {_token:"{{csrf_token()}}", mapel_id:mapel_id, guru_id:guru_id, id:id, jadwal_id:jadwal_id},
          success : function(data) {
            var html = `
                        <a href="#mymodal" data-remote="{{url('jadwal-pelajaran/detail')}}/`+data.id+`" data-toggle="modal"      data-target="#mymodal" data-title="Edit Jadwal : Senin, `+data.jam.jam_awal+` - `+data.jam.jam_akhir+`" data-jadwal_id="`+data.jadwal_id+`" data-id="`+data.hari+``+data.jam_pelajaran_id+`">
                          `+data.mapel.nama??""+`
                          <hr style="margin: 0px; border: 1px solid black;">
                          `+data.guru.nama??""+`
                        </a>`;
            $('#'+id).html(html);
            $('#mymodal').modal('hide');
          }
      });
    });

  });
</script>