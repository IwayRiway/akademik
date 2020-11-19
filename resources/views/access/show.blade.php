<table class="table table-bordered table-striped">
   <thead>
      <tr>
         <th>No.</th>
         <th>Menu Akses</th>
      </tr>
   </thead>
   <tbody>
      @foreach ($menu as $db)
          <tr>
             <td>{{$loop->iteration}}</td>
             <td>{{$db->menu->nama}}</td>
          </tr>
      @endforeach
   </tbody>
</table>

<script>
   $('.table').DataTable();
</script>