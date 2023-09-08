<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonSiswa extends Model
{
    use HasFactory;
    protected $table = 'calon_siswas'; // Nama tabel dalam database

    protected $fillable = [
        'nama',
        'nisn',
        'no_telepon',
        'agama',
        'tanggal_lahir',
        'tempat_lahir',
        'asal_sekolah',
        'alamat',
        'jenis_kelamin',
    ];

    public function biodataOrangTua()
    {
        return $this->hasOne(BiodataOrangTua::class);
    }

}
