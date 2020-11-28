<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        session()->flush();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $username = $request->username;
        if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
            $user = User::with('role')->where('email', $username)->first();
        } else {
            $user = User::with('role')->where('username', $username)->first();
        }
        if($user){
            if (password_verify($request->password, $user->password)){
                if($user->tipe_user != 1){
                    session(['user_id' => $user->user_id]);
                } else {
                    session(['user_id' => $user->id_user]);
                }
                session([
                    'role_access_id' => $user->hak_akses,
                    'role' => $user->role->nama,
                    'username' => $user->username,
                    'nama' => $user->nama
                ]);

                return redirect()->route('dashboard.index');

            } else {
                return redirect()->route('login.index')->with('gagal', 'Password Anda Salah');
            }
        } else {
            return redirect()->route('login.index')->with('gagal', 'Username Anda Tidak Ditemukan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }

    public function signout()
    {
        session()->flush();
        return redirect()->route('login.index');
    }
}
