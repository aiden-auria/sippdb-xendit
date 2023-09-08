@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Registration Form</h2>
        <form method="POST" action="{{ route('calon_siswa.store') }}">
            @csrf
            <div class="form-group">
                <label for="nama">Full Name</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN (National Identity Number)</label>
                <input type="text" name="nisn" id="nisn" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no_telepon">Phone Number</label>
                <input type="text" name="no_telepon" id="no_telepon" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="agama">Religion</label>
                <input type="text" name="agama" id="agama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Date of Birth</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tempat_lahir">Place of Birth</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="asal_sekolah">Previous School</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Address</label>
                <textarea name="alamat" id="alamat" class="form-control" required></textarea>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Gender</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama_ayah">Father's Name</label>
                <input type="text" name="nama_ayah" id="nama_ayah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama_ibu">Mother's Name</label>
                <input type="text" name="nama_ibu" id="nama_ibu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="no_telepon_ortu">Parent's Phone Number</label>
                <input type="text" name="no_telepon_ortu" id="no_telepon_ortu" class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
@endsection
