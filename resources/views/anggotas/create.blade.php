<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Anggota - Koperasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Data Anggota</h4>
                    </div>
                    <div class="card-body">
                        <!-- Menampilkan pesan error validasi jika ada -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Form Input Anggota -->
                        <form action="{{ route('anggotas.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="kode_anggota" class="form-label">Kode Anggota</label>
                                <input type="text" class="form-control" id="kode_anggota" name="kode_anggota" value="{{ old('kode_anggota') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="telepon" class="form-label">No. Telepon</label>
                                <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_gabung" class="form-label">Tanggal Gabung</label>
                                <input type="date" class="form-control" id="tanggal_gabung" name="tanggal_gabung" value="{{ old('tanggal_gabung') }}" required>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('anggotas.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>