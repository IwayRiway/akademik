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
    public function __construct()
    {
        $this->middleware('roleaccess')->except(['store_detail', 'detail', 'update']);
    }
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
            if($db->mapel_id === "0"){
                $mapel = "Istirahat";
            } 
            if ($db->mapel_id === "00"){
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
        JadwalGuru::where('id', $id)->update($request->except('_token', '_method'));
        $data = JadwalGuru::with('mapel', 'guru', 'jam')
                            ->firstWhere('id', $id);

        echo json_encode($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jadwal = JadwalGuru::with('mapel', 'guru', 'jam')
                            ->firstWhere('id', $id);
        JadwalGuru::destroy($id);

        if($jadwal->hari==1){$hari = 'Senin';}
        if($jadwal->hari==2){$hari = 'Selasa';}
        if($jadwal->hari==3){$hari = 'Rabu';}
        if($jadwal->hari==4){$hari = 'Kamis';}
        if($jadwal->hari==5){$hari = 'Jumat';}

        $data = [
            'hari' => $hari,
            'jam_awal' => $jadwal->jam['jam_awal'],
            'jam_akhir' => $jadwal->jam['jam_akhir'],
            'jadwal_id' => $jadwal->jadwal_id
        ];

        echo json_encode($data);
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
        $mapel = Mapel::all();
        $guru = Guru::all();

        if($id[0]=="0"){
            return view('jadwal-pelajaran.detail-create', compact('mapel', 'guru'));
        } else {
            $detail = JadwalGuru::findOrFail($id);
            return view('jadwal-pelajaran.detail-edit', compact('mapel', 'guru', 'detail'));
        }
    }

    public function store_detail(Request $request)
    {
        $id = $request->id;
        $insert = [
            'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
            'jadwal_id' => $request->jadwal_id,
            'hari' => $id[0],
            'jam_pelajaran_id' => $id[1]
        ];

        $jadwal = JadwalGuru::create($insert);
        $data = JadwalGuru::with('mapel', 'guru', 'jam')
                            ->firstWhere('id', $jadwal->id);
        
        echo json_encode($data);
    }
}
