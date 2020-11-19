<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\JadwalGuru;
use App\Models\Jadwal;
use App\Models\JadwalSiswa;
use App\Models\Report;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Report Siswa';
        session(['user_id' => 3]);

        $mapel = JadwalGuru::with(['mapel' => function($query){
                                $query->orderBy('nama', 'desc');
                            }])->where('guru_id', Session::get('user_id'))
                            ->groupBy('mapel_id')
                            ->get();

        $kelas = Jadwal::all();
                    
        return view('report.index', compact('judul', 'mapel', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = "Input Nilai Siswa";
        $mapel = JadwalGuru::with(['mapel' => function($query){
                                $query->orderBy('nama', 'desc');
                            }])->where('guru_id', Session::get('user_id'))
                            ->groupBy('mapel_id')
                            ->get();
        // dd(Session::get('user_id'));
        return view('report.create', compact('judul', 'mapel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa_id = $request->siswa_id;
        $guru_id = Session::get('user_id');
        $mapel_id = $request->mapel;
        $kelas = $request->kelas;
        $jenis = $request->jenis;
        $tanggal_ujian = $request->tanggal_ujian;
        $date = date('Y-m-d H:i:s');

        $insert = [];
        for ($i=0; $i < count($siswa_id); $i++) {
            if($request["nilai_$siswa_id[$i]"]!="" or $request["nilai_$siswa_id[$i]"]!=null){
                $data = [
                    'guru_id' => $guru_id,
                    'siswa_id' => $siswa_id[$i],
                    'mapel_id' => $mapel_id,
                    'kelas' => $kelas,
                    'jenis' => $jenis,
                    'tanggal_ujian' => $tanggal_ujian,
                    'nilai' => $request["nilai_$siswa_id[$i]"],
                    'created_at' => $date,
                    'updated_at' => $date
                ];
                array_push($insert, $data);
            } 
        }

        Report::insert($insert);
        return redirect()->route('report.create')->with('sukses', 'Data Nilai Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $report = Report::with('mapel')->findOrFail($id);

        return view('report.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'nilai' => $request->nilai
        ];

        Report::where('id', $id)->update($data);
        return redirect()->route('report.index')->with('info', 'Data Nilai Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function report($mapel_id)
    {
        // $siswa_db = DB::table('jadwal_siswas')
        //             ->leftJoin('reports', 'jadwal_siswas.siswa_id', '=', 'reports.siswa_id')
        //             ->leftJoin('siswa_sma', 'jadwal_siswas.siswa_id', '=', 'siswa_sma.id')
        //             ->get();
        
        // $kelas = [];
        // $siswa = [];
        // foreach ($siswa_db as $key => $db) {
            // if(in_array("$db->jadwal_id", $kelas)==false){
            //     array_push($kelas, $db->jadwal_id);
            // }

            // if($db->mapel_id == null or $db->mapel_id == $mapel_id){
            //     if(array_key_exists($db->jadwal_id, $siswa)){
            //         array_push($siswa[$db->jadwal_id], $db);
            //     } else {
            //         $siswa[$db->jadwal_id] = [$db];
            //     }
            // }
        // }
        
        $report = Report::with('siswa')
                        ->where([
                            'mapel_id' => $mapel_id,
                            'guru_id' => Session::get('user_id')
                        ])
                        ->get();
        
        $kelas = [];
        $siswa = [];
        foreach ($report as $key => $db) {
            if(in_array("$db->kelas", $kelas)==false){
                array_push($kelas, $db->kelas);
            }

            if(array_key_exists($db->kelas, $siswa)){
                array_push($siswa[$db->kelas], $db);
            } else {
                $siswa[$db->kelas] = [$db];
            }
        }
        
        $data['kelas'] = $kelas;
        $data['siswa'] = $siswa;

        echo json_encode($data);
    }

    public function kelas(Request $request)
    {
        $mapel_id = $request->mapel_id;
        $jadwal_id = JadwalGuru::with('jadwal')
                                ->where([
                                    'mapel_id' => $mapel_id,
                                    'guru_id' => Session::get('user_id')
                                    ])
                                ->groupBy('jadwal_id')
                                ->get();
        
        echo json_encode($jadwal_id);
    }

    public function siswa(Request $request)
    {
        $jadwal_id = $request->jadwal_id;
        $tanggal_ujian = $request->tanggal_ujian;

        $data = JadwalSiswa::with('siswa')
                            ->where('jadwal_id', $jadwal_id)
                            ->whereNotExists(function($query) use($tanggal_ujian){
                                $query->select(DB::raw(1))
                                        ->from('reports')
                                        ->where('tanggal_ujian', $tanggal_ujian)
                                        ->whereRaw('jadwal_siswas.siswa_id = reports.siswa_id');
                            })
                            ->get();

        echo json_encode($data);
    }
}
