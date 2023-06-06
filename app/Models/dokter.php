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
}
