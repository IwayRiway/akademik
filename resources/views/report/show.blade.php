<form action="{{route('report.update', $report->id)}}" method="post">
@csrf
@method('PUT')
<div class="row">
  <div class="col-sm-12">

  <div class="form-group row">
    <label for="mapel_id" class="col-sm-5 col-form-label text-left">Mata Pelajaran <code>*</code> : </label>
    <div class="col-sm-7">
        <input type="text" name="mapel_id" id="mapel_id" value="{{$report->mapel->nama}}" disabled class="form-control">
    </div>
  </div>

  <div class="form-group row">
    <label for="guru_id" class="col-sm-5 col-form-label text-left">Pilih Guru Pengajar <code>*</code> : </label>
    <div class="col-sm-7">
        <input type="text" name="nilai" id="nilai" value="{{$report->nilai}}" max="100" min="0" required class="form-control">
    </div>
  </div>
  <hr>
  <div class="row">
    <div class="col-sm-12 text-right">
      <button class="btn btn-primary" type="submit">Save</button>
    </div>
  </div>

  </div>
</div>
</form>