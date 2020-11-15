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

        return view('jadwal-pelajaran.index', compact('judul'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = "Tambah Jadwal Pelajaran";
        $jam = JamPelajaran::all();
        $mapel = Mapel::all();
        $guru = Guru::all();
        

        return view('jadwal-pelajaran.create', compact('judul', 'jam', 'mapel', 'guru'));
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

    public function jadwal(Request $request)
    {
        $jadwal = Jadwal::firstWhere($request->all('_token'));
        if($jadwal){
            $data = 0;
        } else {
            Jadwal::create($request->all('_token'));
            $data = 1;
        }
        echo json_encode($data);
    }
}
