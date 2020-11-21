<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Siswa;
use App\Models\Mapel;
use App\Models\Jadwal;
use App\Models\JadwalGuru;

class DashboardController extends Controller
{
    public function index()
    {
        $judul = "Dashboard";
        $guru = count(Guru::all());
        $siswa = count(Siswa::all());
        $mapelnya = count(Mapel::all());
        $kelas = Jadwal::all();

        // dd($mapel);

        $jadwal_skrg = JadwalGuru::with('mapel', 'jam')
                                    ->where('hari', date('N', strtotime(date('Y-m-17'))))
                                    ->get();
        // dd($jadwal_skrg);
        $skrg = [];
        foreach ($jadwal_skrg as $key => $db) {
            if($db->mapel_id == null){
                $mapel ="";
            }

            if($db->mapel_id === "00"){
                $mapel ="Upacara";
            }

            if($db->mapel_id === "0"){
                $mapel ="Istirahat";
            } else {
                $mapel = $db->mapel->nama??"";
            }

           if(array_key_exists($db->jadwal_id, $skrg)){
               $data = ['jam' => $db->jam->jam_awal." - ".$db->jam->jam_akhir, 'mapel'=>$mapel];
               array_push($skrg[$db->jadwal_id], $data);
           } else {
               $data = ['jam' => $db->jam->jam_awal." - ".$db->jam->jam_akhir, 'mapel'=>$mapel];
               $skrg[$db->jadwal_id] = [$data];
           }
        }

        $tgl_bsk = date('Y-m-d', strtotime('+1 days', strtotime(date('Y-m-17'))));
        $jadwal_bsk = JadwalGuru::with('mapel', 'jam')
                                    ->where('hari', date('N', strtotime($tgl_bsk)))
                                    ->get();
        // dd($jadwal_bsk);
        $bsk = [];
        foreach ($jadwal_bsk as $key => $db) {
            if($db->mapel_id == null){
                $mapel ="";
            }

            if($db->mapel_id === "00"){
                $mapel ="Upacara";
            }

            if($db->mapel_id === "0"){
                $mapel ="Istirahat";
            } else {
                $mapel = $db->mapel->nama??"";
            }

           if(array_key_exists($db->jadwal_id, $bsk)){
               $data = ['jam' => $db->jam->jam_awal." - ".$db->jam->jam_akhir, 'mapel'=>$mapel];
               array_push($bsk[$db->jadwal_id], $data);
           } else {
               $data = ['jam' => $db->jam->jam_awal." - ".$db->jam->jam_akhir, 'mapel'=>$mapel];
               $bsk[$db->jadwal_id] = [$data];
           }
        }

        return view('dashboard.index', compact('judul', 'guru', 'siswa', 'mapelnya', 'kelas', 'skrg', 'bsk'));
    }
}
