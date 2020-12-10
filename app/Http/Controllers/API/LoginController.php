<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{

    public function test(Request $request)
    {
        $data['code'] = date('N');
        $data['status'] = 'Username Tidak Ditemukan';

        return $request->all();
    }
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = User::with('siswa', 'kelas')->where('username', $username)->where('tipe_user', 3)->first();

        if($user){
            if (password_verify($password, $user->password)){
                $data['code'] = 200;
                $data['status'] = 'Berhasil';
                $data['result'] = [
                    'id_user' => $user->id_user,
                    'user_id' => $user->siswa->id,
                    'username' => $user->username,
                    'nis' => $user->siswa->nis,
                    'nama' => $user->siswa->nama,
                    'jenis_kelamin' => $user->siswa->jenis_kelamin,
                    'poto' => $user->siswa->poto,
                    'kelas' => $user->kelas->jadwal_id
                ];
            } else {
                $data['code'] = 400;
                $data['status'] = 'Password Salah';
            }
        } else {
            $data['code'] = 404;
            $data['status'] = 'Username Tidak Ditemukan';
        }

        return $data;
    }
}
