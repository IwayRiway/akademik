<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index()
    {
        $judul = 'Daftar Siswa';
        $siswa = Siswa::where('aktif', '1')->get();
        return view('siswa.index', compact('siswa', 'judul'));
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }
}
