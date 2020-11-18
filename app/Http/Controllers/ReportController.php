<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\Models\JadwalGuru;
use App\Models\Jadwal;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
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
        $siswa_db = DB::table('jadwal_siswas')
                    ->leftJoin('reports', 'jadwal_siswas.siswa_id', '=', 'reports.siswa_id')
                    ->leftJoin('siswa_sma', 'jadwal_siswas.siswa_id', '=', 'siswa_sma.id')
                    ->get();
        
        $kelas = [];
        $siswa = [];
        foreach ($siswa_db as $key => $db) {
            if(in_array("$db->jadwal_id", $kelas)==false){
                array_push($kelas, $db->jadwal_id);
            }

            if($db->mapel_id == null or $db->mapel_id == $mapel_id){
                if(array_key_exists($db->jadwal_id, $siswa)){
                    array_push($siswa[$db->jadwal_id], $db);
                } else {
                    $siswa[$db->jadwal_id] = [$db];
                }
            }
        }

        $data['kelas'] = $kelas;
        $data['siswa'] = $siswa;

        echo json_encode($data);
    }
}
