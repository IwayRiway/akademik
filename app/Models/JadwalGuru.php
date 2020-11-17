<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalGuru extends Model
{
    use HasFactory;

    protected $fillable = ['mapel_id', 'guru_id', 'jadwal_id', 'hari', 'jam_pelajaran_id'];
    protected $guarded = [];

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id', 'id');
    }

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_id', 'id');
    }

    public function jam()
    {
        return $this->belongsTo(JamPelajaran::class, 'jam_pelajaran_id', 'id');
    }
}
