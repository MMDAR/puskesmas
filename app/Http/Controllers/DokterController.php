<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index()
    {
        $dokters = Dokter::All();
        return view('dokter.index',[
            'dokters' => $dokters
        ]);
    }
    public function create()
    {
        return view('dokter.create');
    }
    public function store(Request $request)
    {
        Dokter::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);
        return redirect('/dokter');

    }
}
