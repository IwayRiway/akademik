<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalGuru;
use App\Models\JadwalSiswa;
use App\Models\JamPelajaran;

class JadwalController extends Controller
{
    public function jadwal(Request $request, $jadwal_kelas)
    {
        $hari = $request->hari;
        $jam = JamPelajaran::all();

        if($hari){
            $jadwal = JadwalGuru::with('mapel', 'guru')
                                ->where([
                                    'jadwal_id' => $jadwal_kelas,
                                    'hari' => $hari
                                ])->get();
        } else {
            $jadwal = JadwalGuru::with('mapel', 'guru')
                                ->where([
                                    'jadwal_id' => $jadwal_kelas,
                                    'hari' => date('N')
                                ])->get();
        }

        $jadwal_temp = [];
        foreach ($jadwal as $key => $db) {

            if($db->mapel_id == "0"){
                $mapel = 'Istirahat';
            } else if($db->mapel_id == '00'){
                $mapel = 'Upacara';
            } else {
                $mapel = $db->mapel->nama??"";
            }

            $dataku = [
                'id' => $db->id,
                'mapel' => $mapel,
                'guru' => $db->guru->nama??"",
                'poto' => $db->guru->poto??""
            ];

            $jadwal_temp[$db->jam_pelajaran_id]  = $dataku;
        }

        $data['code'] = 200;
        $data['status'] = 'success';
        $data['result'] = [];
        foreach ($jam as $key => $db) {
            $dataku = [
                'jam' => $db->jam_awal.' - '.$db->jam_akhir,
                'id' => $jadwal_temp[$db->id]['id']??$db->id,
                'mapel' => $jadwal_temp[$db->id]['mapel']??"",
                'guru' => $jadwal_temp[$db->id]['guru']??"",
                'poto' => $jadwal_temp[$db->id]['poto']??"",
            ];

            array_push($data['result'], $dataku);
        }

        return $data;
    }

    public function siswa($jadwal_kelas)
    {
        $data['code'] = 200;
        $data['status'] = 'success';
        $data['result'] = [];

        $siswaku = JadwalSiswa::with('siswa')->where('jadwal_id', $jadwal_kelas)->get();
        foreach ($siswaku as $key => $db) {
            $dataku = [
                'nama' => $db->siswa->nama,
                'poto' => $db->siswa->poto,
            ];
            array_push($data['result'], $dataku);
        }

        return $data;
    }
}
