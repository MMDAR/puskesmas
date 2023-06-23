<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    // menghubungkan model dengan tabel pasien
    protected $table = 'dokters';

    // mendeklarasikan kolom yang boleh diisi
    protected $fillable = ['nama', 'jk', 'tgl_lahir', 'alamat', 'telp'];

    // menghubungkan ke model pasien
    // 1 dokter dapat menangani banyak pasien 
    public function pasien(){
        // karena dokter menitipkan id ke pasien,
        // maka dokter menghubungkan menggunakan has + kardinalitas
        // kardinalitas 1 to M dari model ini ke model lain: hasMany
        // 1 to 1 ke model lain: hasOne
        return $this->hasMany(Pasien::class); 
    }
}
