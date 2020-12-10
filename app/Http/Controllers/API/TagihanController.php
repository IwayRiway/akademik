<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TagihanController extends Controller
{
    public function tagihan($siswa_id)
    {
        $tagihan = DB::select("SELECT
                                    c.nama, c.besar_tagihan, c.batas_pembayaran
                                FROM
                                    siswa_sma a
                                    LEFT JOIN data_tagihan_sma b ON a.id = b.siswa_id
                                    LEFT JOIN tagihan_sma c ON b.tagihan_sma_id = c.id 
                                    LEFT JOIN pembayaran_sma d ON b.id = d.data_tagihan_sma_id
                                WHERE
                                    a.id = '$siswa_id' 
                                    AND ( b.`status` = 0 OR b.`status` = 2 )");
        
        $data['code'] = 200;
        $data['status'] = "success";
        $data['result'] = $tagihan;

        return $data;
    }

    public function riwayat($siswa_id)
    {
        $riwayat = DB::select("SELECT
                                    DATE_FORMAT(b.tanggal, '%Y-%m-%d') as tanggal,
                                    GROUP_CONCAT(c.nama) as detail,
                                    SUM(REPLACE(b.jumlah,'.','')) as total
                                FROM
                                    siswa_sma a
                                    LEFT JOIN pembayaran_sma b ON a.id = b.siswa_id 
                                    LEFT JOIN tagihan_sma c ON b.tagihan_sma_id = c.id
                                WHERE
                                    a.id = '$siswa_id'
                                    GROUP BY b.tanggal");
        
        $data['code'] = 200;
        $data['status'] = "success";
        $data['result'] = $riwayat;

        return $data;
    }
}
