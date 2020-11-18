<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalSiswa extends Model
{
    use HasFactory;

    protected $fillable = ['siswa_id', 'jadwal_id'];
    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'siswa_id', 'siswa_id');
    }
}
