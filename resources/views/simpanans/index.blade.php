<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Simpanan - Koperasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Simpanan Koperasi</h2>
        <a href="{{ route('simpanans.create') }}" class="btn btn-primary mb-3">+ Tambah Simpanan</a>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Simpanan</th>
                            <th>Nama Anggota</th>
                            <th>Jenis Simpanan</th>
                            <th>Jumlah</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($simpanans as $simpanan)
                        <tr>
                            <td>{{ $simpanan->kode_simpanan }}</td>
                            <td>{{ $simpanan->anggota->nama ?? '-' }}</td>
                            <td>{{ $simpanan->jenis_simpanan }}</td>
                            <td>Rp {{ number_format($simpanan->jumlah, 0, ',', '.') }}</td>
                            <td>{{ $simpanan->tanggal }}</td>
                            <td>
                                <a href="{{ route('simpanans.edit', $simpanan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('simpanans.destroy', $simpanan->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data simpanan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>