<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function reportUH($siswa_id)
    {
        $reportUH = DB::select("SELECT a.nilai, 
                                        a.tanggal_ujian, 
                                        b.nama 
                                FROM   reports a 
                                        JOIN mapels b 
                                        ON a.mapel_id = b.id 
                                WHERE  a.siswa_id = '$siswa_id' 
                                        AND a.jenis = 1 
                                ORDER  BY a.tanggal_ujian DESC ");

        $data['code'] = 200;
        $data['status'] = "success";
        $data['result'] = $reportUH;
        
        return $data;
    }

    public function reportUTS($siswa_id)
    {
        $reportUTS = DB::select("SELECT a.nilai, 
                                            a.tanggal_ujian, 
                                            b.nama 
                                    FROM   reports a 
                                            JOIN mapels b 
                                            ON a.mapel_id = b.id 
                                    WHERE  a.siswa_id = '$siswa_id' 
                                            AND a.jenis = 2 
                                    ORDER  BY a.tanggal_ujian DESC ");

        $data['code'] = 200;
        $data['status'] = "success";
        $data['result'] = $reportUTS;
        
        return $data;
    }

    public function reportUAS($siswa_id)
    {

        $reportUAS = DB::select("SELECT a.nilai, 
                                            a.tanggal_ujian, 
                                            b.nama 
                                    FROM   reports a 
                                            JOIN mapels b 
                                            ON a.mapel_id = b.id 
                                    WHERE  a.siswa_id = '$siswa_id' 
                                            AND a.jenis = 3 
                                    ORDER  BY a.tanggal_ujian DESC ");

        $data['code'] = 200;
        $data['status'] = "success";
        $data['result'] = $reportUAS;
        
        return $data;
    }
}
