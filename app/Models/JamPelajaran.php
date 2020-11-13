<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JamPelajaran extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['jam_awal', 'jam_akhir'];
    protected $guarded = [];
}
