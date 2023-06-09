<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    // menampilkan semua data pasien
    public function index()
    {
        $pasiens = Pasien::all();
        return view('pasien.index',[
            'pasiens' => $pasiens
        ]);
    }
    public function create()
    {
        return view('pasien.create');
    }
    // method untuk menyimpan ke database
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

        Pasien::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);
        return redirect('/pasien');
    }
    
    public function edit ($id){
        // Cari pasien berdasarkan id
        $pasien = Pasien::find($id);

        return view('pasien.edit', [
            'pasien' => $pasien,
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
        $pasien = Pasien::find($id);

        // simpan perubahan
        $pasien->update([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
        ]);

        return redirect('/pasien')->with('success', 'Data pasien berhasil diperbaharui');
    }

    // method hapus
    public function destroy(Request $request){
      Pasien::destroy($request->id);

        return redirect('/pasien')->with('success', 'Data pasien berhasil dihapus!');
    }
}
