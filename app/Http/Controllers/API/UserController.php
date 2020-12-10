<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function update(Request $request, $id_user)
    {
        $username = $request->username;
        $cek = User::where('id_user', $id_user)->first();
        
        if(!$cek){
            $data1['code'] = 404;
            $data1['status'] = 'Username Tidak Ditemukan';
            return $data1;
        }

        if($cek->username == $username){
            $data['password'] = bcrypt($request->password); 
        } else {
            $cekUser = User::where('username', $username)->first();

            if($cekUser){
                $data1['code'] = 400;
                $data1['status'] = 'Username Sudah Digunakan';
                return $data1;
            } else {
                $data['password'] = bcrypt($request->password); 
                $data['username'] = $username; 
            }
        }

        User::where('id_user', $id_user)->update($data);

        $data1['code'] = 200;
        $data1['status'] = 'Data berhasil diupdate';
        return $data1;
    }
}
