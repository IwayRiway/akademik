<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Access;
use App\Models\RoleAccess;
use App\Models\Menu;

class AccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('roleaccess')->except(['show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $judul = 'Menu Role Access';
        $role = Access::with('role')->groupBy('role_access_id')->get();

        return view('access.index', compact('judul', 'role'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Add Menu Role Access';
        $menu = Menu::where('jenis',1)->get();
        $role = RoleAccess::all();

        return view('access.create', compact('judul', 'menu', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $menu_id = $request->menu_id;
        $role_access_id = $request->role;
        // $insert = [];

        for ($i=0; $i < count($menu_id); $i++) { 
            $data = [
                'role_access_id' => $role_access_id,
                'menu_id' => $menu_id[$i]
            ];
            Access::firstOrCreate($data);
            // array_push($insert, $data);
        }

        return redirect()->route('access.index')->with('sukses', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Access::with('menu')
                            ->where('role_access_id', $id)
                            ->get();
        return view('access.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $judul = 'Edit Menu Role Access';
        $menu = Menu::where('jenis',1)->get();
        $role = Access::with('menu', 'role')
                        ->where('role_access_id', $id)
                        ->get();

        return view('access.edit', compact('judul', 'menu', 'role'));
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
        Access::destroy($id);
        return redirect()->back()->with('warning', 'Data Berhasil Terhapus');
    }
}
