<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;
    public static function getAll()
    {
        return [
            [
                "nama" => 'Andi',
                "jk" => 'L',
                "tgl_lahir" => '08/12/2002',
                "alamat" => 'Bogor',
                "telp" => '08123456789'
            ],
            [
                "nama" => 'Ameer',
                "jk" => 'L',
                "tgl_lahir" => '15/10/2002',
                "alamat" => 'Semarang',
                "telp" => '08123456789'

            ]
            ];
    }
}
