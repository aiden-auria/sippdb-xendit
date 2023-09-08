<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BiodataOrangTua extends Model
{
    use HasFactory;

    protected $table = 'biodata_orang_tuas'; // Nama tabel dalam database

    protected $fillable = [
        'calon_siswa_id',
        // Kolom ini digunakan untuk menghubungkan dengan calon_siswa
        'nama_ayah',
        'pekerjaan_ayah',
        'penghasilan_ayah',
        'nama_ibu',
        'pekerjaan_ibu',
        'penghasilan_ibu',
        'no_telepon',
    ];

    public function calonSiswa()
    {
        return $this->belongsTo(CalonSiswa::class);
    }

}
