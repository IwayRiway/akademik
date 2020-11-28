<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{

    public function test()
    {
        $data['code'] = 404;
        $data['status'] = 'Username Tidak Ditemukan';

        return $data;
    }
    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = User::with('siswa')->where('username', $username)->where('tipe_user', 3)->first();

        if($user){
            if (password_verify($password, $user->password)){
                $data['code'] = 200;
                $data['status'] = 'Berhasil';
                $data['result'] = [
                    'username' => $user->username,
                    'nis' => $user->siswa->nis,
                    'nama' => $user->siswa->nama,
                    'jenis_kelamin' => $user->siswa->jenis_kelamin,
                    'poto' => $user->siswa->poto,
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
