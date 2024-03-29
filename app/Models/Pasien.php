<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;
    // menghubungkan model dengan tabel pasien
    protected $table = 'pasiens';

    // mendeklarasikan kolom yang boleh diisi
    protected $fillable = ['nama','jk','tgl_lahir','alamat','telp', 'dokter_id'];

    // menghubungkan pasien ke model dokter
    public function dokter()
    {
        // karena status model saat ini adalah yang dititipkan id, 
        // maka dapat menggunakan belongs to atau belongs to many
        return $this->belongsTo(Dokter::class);
    }
}
