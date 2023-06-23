<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
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
        $dokters  = Dokter::all();
        return view('pasien.create',[
            'dokters' => $dokters
        ]);
    }
    // method untuk menyimpan ke database
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required|min:3',
            'jk' => 'required',
            'tgl_lahir' => 'required|date',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'dokter_id' => 'required'

        ]);

        Pasien::create([
            'nama' => $request->nama,
            'jk' => $request->jk,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'dokter_id' => $request->dokter_id

        ]);
        return redirect('/pasien');
    }
    
    public function edit ($id){
        // Cari pasien berdasarkan id
        $pasien = Pasien::find($id);

        $dokters = Dokter::all();


        return view('pasien.edit', [
            'pasien' => $pasien,
            'dokters' => $dokters
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
            'dokter_id' => 'required'

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
            'dokter_id' => $request->dokter_id

        ]);



        return redirect('/pasien')->with('success', 'Data pasien berhasil diperbaharui');
    }


    // method hapus
    public function destroy(Request $request){
      Pasien::destroy($request->id);

        return redirect('/pasien')->with('success', 'Data pasien berhasil dihapus!');
    }
}
