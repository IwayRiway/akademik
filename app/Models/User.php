<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'username',
        'password',
        'hak_akses',
        'email',
        'tipe_user',
        'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $table = 'user';
    public $timestamps = false;
    protected $primaryKey = 'id_user';

    public function role()
    {
        return $this->belongsTo(RoleAccess::class, 'hak_akses', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'user_id', 'id');
    }

    public function kelas()
    {
        return $this->belongsTo(JadwalSiswa::class, 'user_id', 'siswa_id');
    }
}
