<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nip', 'nama', 'tempat', 'tanggal_lahir', 'jenis_kelamin', 'poto', 'alamat'];
    protected $guarded = [];
}
