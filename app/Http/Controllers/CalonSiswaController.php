<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalonSiswaController extends Controller
{
    public function create()
    {
        return view('calon_siswa.form'); // Menampilkan form input
    }

    public function store(Request $request)
    {
        // Validasi data yang diinputkan
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'nisn' => 'required|string|unique:calon_siswa,nisn',
            'no_telepon' => 'required|string',
            'agama' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string',
            'asal_sekolah' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'nama_ayah' => 'required|string',
            'pekerjaan_ayah' => 'required|string',
            'penghasilan_ayah' => 'required|string',
            'nama_ibu' => 'required|string',
            'pekerjaan_ibu' => 'required|string',
            'penghasilan_ibu' => 'required|string',
            'no_telepon_ortu' => 'required|string',
        ]);

        // Menyimpan data CalonSiswa
        $calonSiswa = CalonSiswa::create($validatedData);

        // Menyimpan data BiodataOrangTua yang terkait
        $biodataOrangTuaData = [
            'calon_siswa_id' => $calonSiswa->id,
            'nama_ayah' => $request->input('nama_ayah'),
            'pekerjaan_ayah' => $request->input('pekerjaan_ayah'),
            'penghasilan_ayah' => $request->input('penghasilan_ayah'),
            'nama_ibu' => $request->input('nama_ibu'),
            'pekerjaan_ibu' => $request->input('pekerjaan_ibu'),
            'penghasilan_ibu' => $request->input('penghasilan_ibu'),
            'no_telepon' => $request->input('no_telepon_ortu'),
        ];

        BiodataOrangTua::create($biodataOrangTuaData);

        return redirect()->route('calon-siswa.show', $calonSiswa->id)
            ->with('success', 'Data calon siswa berhasil disimpan.');
    }

    public function show($id)
    {
        $calonSiswa = CalonSiswa::with('biodataOrangTua')->findOrFail($id);

        return view('calon_siswa.detail', compact('calonSiswa'));
    }

}
