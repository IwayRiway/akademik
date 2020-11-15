<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalGuru extends Model
{
    use HasFactory;

    protected $fillable = ['mapel_id', 'guru_id', 'jadwal_id', 'hari'];
    protected $guarded = [];
}
