<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Anggota - Koperasi</title>
    <!-- Menggunakan Bootstrap 5 untuk mempercantik tampilan -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Anggota Koperasi</h2>
        
        <!-- Tombol menuju halaman tambah data -->
        <a href="{{ route('anggotas.create') }}" class="btn btn-primary mb-3">+ Tambah Anggota</a>
        
        <!-- Pesan Sukses jika data berhasil disimpan/diubah/dihapus -->
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Anggota</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Tanggal Gabung</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($anggotas as $anggota)
                        <tr>
                            <td>{{ $anggota->kode_anggota }}</td>
                            <td>{{ $anggota->nama }}</td>
                            <td>{{ $anggota->alamat }}</td>
                            <td>{{ $anggota->telepon }}</td>
                            <td>{{ $anggota->tanggal_gabung }}</td>
                            <td>
                                <!-- Tombol Edit -->
                                <a href="{{ route('anggotas.edit', $anggota->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <!-- Tombol Hapus -->
                                <form action="{{ route('anggotas.destroy', $anggota->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data anggota.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>