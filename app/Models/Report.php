<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $fillable = ['guru_id', 'siswa_id', 'mapel_id', 'kelas', 'nilai', 'jenis', 'tanggal_ujian'];
    protected $guarded = [];
}
