<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JamPelajaran;

class JamPelajaranController extends Controller
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
        $judul = "Master Data Jam Pelajaran";
        $jam = JamPelajaran::all();

        return view('jam-pelajaran.index', compact('judul','jam'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = "Tambah Data Jam Pelajaran";

        return view('jam-pelajaran.create', compact('judul'));
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
            'jam_awal' => ['required','max:5', 'unique:jam_pelajarans,jam_awal,NULL,id,deleted_at,NULL'],
            'jam_akhir' => ['required', 'max:5']
        ]);

        JamPelajaran::create($request->all());
        return redirect()->route('jam-pelajaran.index')->with('sukses', 'Data Berhasil Ditambahkan');
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
        $judul = "Master Data Jam Pelajaran";
        $jam = JamPelajaran::findOrFail($id);

        return view('jam-pelajaran.edit', compact('judul','jam'));
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
            'jam_awal' => ['required','max:5', "unique:jam_pelajarans,jam_awal,$id,id,deleted_at,NULL"],
            'jam_akhir' => ['required', 'max:5']
        ]);

        JamPelajaran::where('id', $id)->update($request->except('_token','_method'));
        return redirect()->route('jam-pelajaran.index')->with('info', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JamPelajaran::findOrFail($id)->delete();
        return redirect()->route('jam-pelajaran.index')->with('warning', 'Data Berhasil Terhapus');
    }
}
