<div class="row">
   <div class="col-sm-3">
      @if ($guru->poto==null)
         <img src="{{asset('assets/img/avatar/avatar-3.png')}}" alt="" width="100" class="mt-5 ml-2">
      @else
      <img src="{{asset("storage/$guru->poto")}}" alt="" width="100" class="mt-5 ml-2">
      @endif
   </div>

   <div class="col-sm-9">
      <table class="table table-bordered">
         <tr>
            <th>NIP</th>
            <td>{{$guru->nip}}</td>
         </tr>
         <tr>
            <th>Nama Lengkap</th>
            <td>{{$guru->nama}}</td>
         </tr>
         <tr>
            <th>Tempat, Tanggal Lahir</th>
            <td>{{$guru->tempat}}, {{date('d F Y', strtotime($guru->tanggal_lahir))}}</td>
         </tr>
         <tr>
            <th>Jenis Kelamin</th>
            <td>{{$guru->jenis_kelamin==1?'Laki-Laki':'Perempuan'}}</td>
         </tr>
      </table>
   </div>
</div>
<div class="row">
   <div class="col-sm-12">
      <table class="table table-bordered">
         <th>Alamat Lengkap</th>
         <td>{{$guru->alamat}}</td>
      </table>
   </div>
</div>