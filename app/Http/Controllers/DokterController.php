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
        // Validasi nama
        $request->validate([
            'nama' => 'required|min:3',
            'jk' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'telp' => 'required|numeric',
        ]);
        
        Dokter::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);
        return redirect('/dokter');

    }

    public function edit($id)
    {
        // Cari dokter berdasarkan id
        $dokter = Dokter::find($id);

        return view('dokter.edit', [
            'dokter' => $dokter,
        ]);
    }


    public function update ($id, Request $request){
        // Validasi nama
        $request->validate([
            'nama' => 'required|min:3',
            'jk' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'telp' => 'required|numeric',
        ]);

        // cari pasien berdasarkan id
        $dokter = Dokter::find($id);

        // simpan perubahan
        $dokter->update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);

        return redirect('/dokter')->with('success', 'Data dokter berhasil diperbaharui');
    }

    // method hapus
    public function destroy(Request $request){
      Dokter::destroy($request->id);

        return redirect('/dokter')->with('success', 'Data dokter berhasil dihapus!');
    }
}
