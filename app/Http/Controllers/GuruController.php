<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use Illuminate\Support\Facades\Storage;

class GuruController extends Controller
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
        session()->put('key', 'value');
        $judul = 'Data Guru';
        $guru = Guru::all();

        return view('guru.index', compact('judul', 'guru'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $judul = 'Tambah Data Guru';

        return view('guru.create', compact('judul'));
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
            'nip' => ['required', 'max:15', 'unique:gurus'],
            'nama' => ['required', 'max:50'],
            'tempat' => ['required', 'max:50'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
        ]);

        $data = $request->all();
        if ($request->file('poto')) {
            $data['poto'] = $request->file('poto')->store('images/guru');
        }
        Guru::create($data);
        return redirect()->route('guru.index')->with('sukses', 'Data Guru Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $guru = Guru::findOrFail($id);

        return view('guru.show', compact('guru'));
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
        $guru = Guru::findOrFail($id);

        return view('guru.edit', compact('judul', 'guru'));
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
            'nip' => ['required', 'max:15', "unique:gurus,nip,$id,id"],
            'nama' => ['required', 'max:50'],
            'tempat' => ['required', 'max:50'],
            'tanggal_lahir' => ['required'],
            'jenis_kelamin' => ['required'],
            'alamat' => ['required'],
        ]);

        $data = $request->except('_token','_method');
        if ($request->file('poto')) {
            $data['poto'] = $request->file('poto')->store('images/guru');
            $guru = Guru::findOrFail($id);
            Storage::disk('public')->delete($guru->poto);
        }

        Guru::where('id', $id)->update($data);
        return redirect()->route('guru.index')->with('info', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        if($guru->poto!=null)
            Storage::disk('public')->delete($guru->poto);
        
        $guru->delete();
        return redirect()->route('guru.index')->with('warning', 'Data Berhasil Terhapus');
    }
}
