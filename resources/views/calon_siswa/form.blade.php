<!DOCTYPE html>
<html>

<head>
    <title>Calon Siswa Form</title>
</head>

<body>
    <h1>Calon Siswa Form</h1>
    <form method="POST" action="{{ route('calon-siswa.store') }}">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required><br>

        <label for="nisn">NISN:</label>
        <input type="text" id="nisn" name="nisn" required><br>

        <!-- Add other form fields here for other student details -->

        <label for="nama_ayah">Nama Ayah:</label>
        <input type="text" id="nama_ayah" name="nama_ayah" required><br>

        <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" required><br>

        <!-- Add other form fields for parent details -->

        <button type="submit">Simpan</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>

</html>
