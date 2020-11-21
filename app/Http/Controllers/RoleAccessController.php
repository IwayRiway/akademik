<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoleAccess;

class RoleAccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('roleaccess');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = "Role Access";
        $role = RoleAccess::all();

        return view('role-access.index', compact('judul', 'role'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = "Tambah Role Access";

        return view('role-access.create', compact('judul'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama' => ['required', 'unique:role_accesses'],
        ]);

        RoleAccess::create($request->all());
        return redirect()->route('role-access.index')->with('sukses', 'Data Role Berhasil Ditambahkan');
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
        $judul = "Ubah Data Guru";
        $role = RoleAccess::findOrFail($id);

        return view('role-access.edit', compact('judul', 'role'));
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
        $validate = $request->validate([
            'nama' => ['required', "unique:role_accesses,nama,$id,id"],
        ]);

        RoleAccess::where('id', $id)->update($request->except('_token', '_method'));
        return redirect()->route('role-access.index')->with('info', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RoleAccess::findOrFail($id)->delete();
        return redirect()->route('role-access.index')->with('warning', 'Data Berhasil Terhapus');
    }
}
