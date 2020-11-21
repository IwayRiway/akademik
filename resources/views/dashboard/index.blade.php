@extends('templates/main')
@section('content')

<section class="section">
   <div class="section-header">
     <h1>{{$judul}}</h1>
   </div>

   <div class="section-body">

    <div class="row">

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="fas fa-user-graduate"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Guru</h4>
            </div>
            <div class="card-body">
              {{$guru}}
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="fas fa-graduation-cap"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Siswa</h4>
            </div>
            <div class="card-body">
              {{$siswa}}
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="fas fa-school"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Kelas</h4>
            </div>
            <div class="card-body">
              {{count($kelas)}}
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-success">
            <i class="fas fa-book"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Total Mata Pelajaran</h4>
            </div>
            <div class="card-body">
              {{$mapelnya}}
            </div>
          </div>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col-12 col-sm-5 col-lg-5">
        <div class="card">
          <div class="card-header">
            <h4>Jadwal Hari Ini : {{date('l')}}, {{date('d F Y')}}</h4>
          </div>
          <div class="card-body">
            <ul class="nav nav-pills" id="myTab3" role="tablist">
              @foreach ($kelas as $db)
                <li class="nav-item">
                  <a class="nav-link {{$loop->iteration==1?'active':''}}" id="home-tab{{$db->id}}" data-toggle="tab" href="#home{{$db->id}}" role="tab" aria-controls="home" aria-selected="true">{{$db->kelas}}-{{$db->jurusan}}-{{$db->postfix}}</a>
                </li>
              @endforeach
            </ul>
            <div class="tab-content" id="myTabContent2">
              @foreach ($kelas as $db)
                <div class="tab-pane fade {{$loop->iteration==1?'show active':''}}" id="home{{$db->id}}" role="tabpanel" aria-labelledby="home-tab{{$db->id}}">
                  <table class="table table-hovered table-striped datatable">
                      <thead>
                        <tr>
                          <th>Jam</th>
                          <th>Mata Pelajaran</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if (array_key_exists($db->id, $skrg))
                          @for ($i = 0; $i < count($skrg[$db->id]); $i++)
                            <tr>
                              <td>{{$skrg[$db->id][$i]['jam']}}</td>
                              <td>{{$skrg[$db->id][$i]['mapel']}}</td>
                            </tr>
                          @endfor
                        @endif
                      </tbody>
                  </table>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-7 col-lg-7">
        <div class="card">
          <div class="card-header">
            <h4>Jadwal Besok : {{date('l', strtotime('+1 days', strtotime(date('Y-m-d'))))}}, {{date('d F Y', strtotime('+1 days', strtotime(date('Y-m-d'))))}}</h4>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-sm-12 col-md-3">
                <ul class="nav nav-pills flex-column" id="myTab4" role="tablist">
                  @foreach ($kelas as $db)
                    <li class="nav-item">
                      <a class="nav-link {{$loop->iteration==1?'active':''}}" id="home-tab-besok{{$db->id}}" data-toggle="tab" href="#home-besok{{$db->id}}" role="tab" aria-controls="home" aria-selected="true">{{$db->kelas}}-{{$db->jurusan}}-{{$db->postfix}}</a>
                    </li>    
                  @endforeach
                </ul>
              </div>
              <div class="col-12 col-sm-12 col-md-9">
                <div class="tab-content no-padding" id="myTab2Content">
                  @foreach ($kelas as $db)
                  <div class="tab-pane fade {{$loop->iteration==1?'show active':''}}" id="home-besok{{$db->id}}" role="tabpanel" aria-labelledby="home-tab-besok{{$db->id}}">
                    <table class="table table-hovered table-striped datatable">
                        <thead>
                          <tr>
                            <th>Jam</th>
                            <th>Mata Pelajaran</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if (array_key_exists($db->id, $bsk))
                          @for ($i = 0; $i < count($bsk[$db->id]); $i++)
                            <tr>
                              <td>{{$bsk[$db->id][$i]['jam']}}</td>
                              <td>{{$bsk[$db->id][$i]['mapel']}}</td>
                            </tr>
                          @endfor
                        @endif
                        </tbody>
                    </table>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

   </div>
 </section>
   
@endsection('content')

@push('after-script')
    <script>
      $(document).ready(function(){
        $('.datatable').DataTable({
          "dom":"ftip",
          "ordering": false,
          "lengthChange": false,
          "paging":   false,
        });
      });
    </script>
@endpush
 