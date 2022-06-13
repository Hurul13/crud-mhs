<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswa";
    protected $fillable = [
        'NRP', 'Nama', 'Kelas',  'Jenis_Kelamin',  'Tanggal_Lahir', 'Alamat', 'dokumen'
    ];
}
