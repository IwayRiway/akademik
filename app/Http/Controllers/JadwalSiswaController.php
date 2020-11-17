<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Jadwal;
use App\Models\JadwalSiswa;

class JadwalSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Data Kelas Siswa";
        $kelas = Jadwal::all();

        return view('jadwal-siswa.index', compact('judul', 'kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = "Masukan Data Siswa Ke Kelas";
        $jadwal = Jadwal::all();

        return view('jadwal-siswa.create', compact('judul', 'jadwal'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $siswa = $request->siswa_id;
        $jadwal_id = $request->jadwal_id;
        $jml = count($siswa);
        $insert = [];

        for ($i=0; $i < $jml; $i++) { 
            $data = [
                'siswa_id' => $siswa[$i],
                'jadwal_id' => $jadwal_id
            ];
            array_push($insert, $data);
        }

        JadwalSiswa::insert($insert);
        return redirect()->route('jadwal-siswa.index')->with('sukses', 'Kelas Siswa Berhasil Disimpan');
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

    public function siswa(Request $request)
    {
        $kelas = explode('-', $request->kelas);

        if($kelas[0]=='X'){$kls = '10';}
        if($kelas[0]=='XI'){$kls = '11';}
        if($kelas[0]=='XII'){$kls = '12';}

        $data = Siswa::where([
                        'kelas' => $kls,
                        'jurusan' => $kelas[1],
                        'aktif' => 1
                        ])->get();

        echo json_encode($data);
    }
}
