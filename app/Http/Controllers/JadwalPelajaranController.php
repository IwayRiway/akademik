<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;
use App\Models\JadwalGuru;
use App\Models\JamPelajaran;
use App\Models\Mapel;
use App\Models\Guru;

class JadwalPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Jadwal Pelajaran";
        $kelas = Jadwal::all();

        return view('jadwal-pelajaran.index', compact('judul', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = "Tambah Jadwal Pelajaran";
        $jadwal = Jadwal::all();
        $jam = JamPelajaran::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        

        return view('jadwal-pelajaran.create', compact('judul', 'jadwal', 'jam', 'mapel', 'guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $jam = JamPelajaran::all();
        $insert = [];
        $hari = $request->hari;
        $jadwal_id = $request->kelas;

        foreach ($jam as $key => $db) {
            $id = $db->id;
            $data = [
                'jam_pelajaran_id' => $id,
                'jadwal_id' => $jadwal_id,
                'hari' => $hari,
                'mapel_id' =>$request["mapel_id_$id"],
                'guru_id' =>$request["guru_id_$id"]
            ];

            array_push($insert, $data);
        }

        JadwalGuru::insert($insert);
        return redirect()->route('jadwal-pelajaran.index')->with('sukses', 'Jadwal Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jadwal = JadwalGuru::with('mapel', 'guru')
                            ->where('jadwal_id', $id)
                            ->orderBy('hari', 'asc')
                            ->get();

        $data['jam'] = JamPelajaran::all();

        $senin = [];
        $selasa = [];
        $rabu = [];
        $kamis = [];
        $jumat = [];

        foreach ($jadwal as $key => $db) {
            if($db->mapel_id == "0"){
                $mapel = "Istirahat";
            } else if ($db->mapel_id == "00"){
                $mapel = "Upacara";
            } else {
                $mapel = $db->mapel["nama"]??"";
            }

            if ($db->hari == 1) {
                $senin[$db->jam_pelajaran_id] = [
                    'id' => $db->id,
                    'mapel' => $mapel,
                    'guru' => $db->guru["nama"]??""
                ];
            }
            if ($db->hari == 2) {
                $selasa[$db->jam_pelajaran_id] = [
                    'id' => $db->id,
                    'mapel' => $mapel,
                    'guru' => $db->guru["nama"]??""
                ];
            }
            if ($db->hari == 3) {
                $rabu[$db->jam_pelajaran_id] = [
                    'id' => $db->id,
                    'mapel' => $mapel,
                    'guru' => $db->guru["nama"]??""
                ];
            }
            if ($db->hari == 4) {
                $kamis[$db->jam_pelajaran_id] = [
                    'id' => $db->id,
                    'mapel' => $mapel,
                    'guru' => $db->guru["nama"]??""
                ];
            }
            if ($db->hari == 5) {
                $jumat[$db->jam_pelajaran_id] = [
                    'id' => $db->id,
                    'mapel' => $mapel,
                    'guru' => $db->guru["nama"]??""
                ];
            }
        }

        $data['senin'] = $senin;
        $data['selasa'] = $selasa;
        $data['rabu'] = $rabu;
        $data['kamis'] = $kamis;
        $data['jumat'] = $jumat;
        
        echo json_encode($data);
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

    public function jadwal(Request $request)
    {
        $jadwal = JadwalGuru::firstWhere($request->except('_token'));
        if($jadwal){
            $data = 0;
        } else {
            $data = 1;
        }
        echo json_encode($data);
    }

    public function detail($id)
    {
        # code...
    }
}
