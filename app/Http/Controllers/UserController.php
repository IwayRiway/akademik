<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\RoleAccess;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Daftar User";
        $user = User::with('role')->get();
        return view('user.index', compact('judul', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = "Tambah User";
        $role = RoleAccess::all();

        return view('user.create', compact('judul','role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function siswa(Request $request)
    {
        $data = Siswa::where('aktif', 1)
                        ->whereNotExists(function($query) use($request){
                            $query->select(DB::raw(1))
                                    ->from('user')
                                    ->where('tipe_user', $request->tipe_user)
                                    ->whereRaw('user.user_id = siswa_sma.id');
                        })->get();
                        
        echo json_encode($data);
    }

    public function guru(Request $request)
    {
        $data = Guru::where('deleted_at', null)
                        ->whereNotExists(function($query) use($request){
                            $query->select(DB::raw(1))
                                    ->from('user')
                                    ->where('tipe_user', $request->tipe_user)
                                    ->whereRaw('user.user_id = gurus.id');
                        })->get();

        echo json_encode($data);
    }

    public function user(Request $request)
    {
        if($request->tipe_user==2){
            $user = Guru::findOrFail($request->user_id);
            $data['username'] = $user->nip;
        } else {
            $user = Siswa::findOrFail($request->user_id);
            $data['username'] = $user->nis;
        }

        $data['nama'] = $user->nama;
        echo json_encode($data);
    }
}
