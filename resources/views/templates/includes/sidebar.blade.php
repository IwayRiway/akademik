@php
    $side = Request::segment(1);
@endphp
<div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <a href="index.html">SI-Akademik</a>
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <a href="index.html">SIA</a>
     </div>
     <ul class="sidebar-menu">
       <li class="menu-header">Navigation</li>
       <li class="{{$side=='dashboard'?'active':''}}"><a class="nav-link" href="{{route('dashboard.index')}}"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>

       <li class="{{$side=='siswa'?'active':''}}"><a class="nav-link" href="{{route('siswa.index')}}"><i class="fas fa-fire"></i><span>Data Siswa</span></a></li> 

       <li class="{{$side=='dashboard'?'mapel':''}}"><a class="nav-link" href="{{route('mapel.index')}}"><i class="fas fa-fire"></i><span>Data Mata Pelajaran</span></a></li>

       <li class="{{$side=='guru'?'active':''}}"><a class="nav-link" href="{{route('guru.index')}}"><i class="fas fa-fire"></i><span>Data Guru</span></a></li> 

       <li class="{{$side=='jam-pelajaran'?'active':''}}"><a class="nav-link" href="{{route('jam-pelajaran.index')}}"><i class="fas fa-fire"></i><span>Master Data Jam</span></a></li> 

       <li {{$side=='jadwal'?'active':''}}><a class="nav-link" href="{{route('jadwal.index')}}"><i class="fas fa-fire"></i><span>Master Kelas</span></a></li> 

       <li {{$side=='jadwal-pelajaran'?'active':''}}><a class="nav-link" href="{{route('jadwal-pelajaran.index')}}"><i class="fas fa-fire"></i><span>Jadwal Pelajaran</span></a></li> 

       <li {{$side=='jadwal-siswa'?'active':''}}><a class="nav-link" href="{{route('jadwal-siswa.index')}}"><i class="fas fa-fire"></i><span>Master Kelas Siswa</span></a></li> 

       <li {{$side=='report'?'active':''}}><a class="nav-link" href="{{route('report.index')}}"><i class="fas fa-fire"></i><span>Report</span></a></li>
       
       <li class="dropdown {{$side=='role-access'?'active':''}} {{$side=='role-access'?'active':''}} {{$side=='user'?'active':''}}" >
         <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Manajemen Menu</span></a>
         <ul class="dropdown-menu">
           <li class="{{$side=='role-access'?'active':''}}"><a class="nav-link" href="{{route('role-access.index')}}">Role Access</a></li>
           <li class="{{$side=='access'?'active':''}}"><a class="nav-link" href="{{route('access.index')}}">Menu Role Access</a></li>
           <li class="{{$side=='user'?'active':''}}"><a class="nav-link" href="{{route('user.index')}}">User Manajemen</a></li>
         </ul>
       </li>
   </aside>
 </div>