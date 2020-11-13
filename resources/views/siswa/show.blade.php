<table class="table table-bordered">
   <tr>
       <th>NIS</th>
       <td>{{$siswa->nis}}</td>
   </tr>
   <tr>
       <th>Nama</th>
       <td>{{$siswa->nama}}</td>
   </tr>
   <tr>
       <th>Nama Panggilan</th>
       <td>{{$siswa->nama_panggilan}}</td>
   </tr>
   <tr>
       <th>Jenis Kelamin</th>
       <td>{{$siswa->jenis_kelamin==1?'Laki-Laki':'Perempuan'}}</td>
   </tr>
   <tr>
       <th>Tempat, Tanggal Lahir</th>
       <td>{{$siswa->tempat_lahir}}, {{$siswa->tanggal_lahir}}</td>
   </tr>
   <tr>
      <th>Tipe, Kelas</th>
      <td>{{$siswa->tipe==1?'Fullday':'Boarding'}}, {{$siswa->kelas}} {{$siswa->jurusan}}</td>
  </tr>
   <tr>
       <th>Alamat</th>
       <td>{{$siswa->alamat}}</td>
   </tr>
   <tr>
       <th>Anak Ke -</th>
       <td>{{$siswa->anak_ke}}</td>
   </tr>
   <tr>
       <th>Jumlah Saudara</th>
       <td>{{$siswa->jml_saudara}}</td>
   </tr>
   <tr>
       <th>Berat, Tinngi, Gol.Darag</th>
   <td>{{$siswa->berat}} Kg, {{$siswa->tinggi}} cm, {{$siswa->gol_darah}}</td>
   </tr>
   
</table>