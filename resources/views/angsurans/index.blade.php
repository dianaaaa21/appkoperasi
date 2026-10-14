<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Angsuran - Koperasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Angsuran Koperasi</h2>
        <a href="{{ route('angsurans.create') }}" class="btn btn-primary mb-3">+ Tambah Angsuran</a>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Angsuran</th>
                            <th>Kode Pinjaman</th>
                            <th>Nama Anggota</th>
                            <th>Angsuran Ke</th>
                            <th>Jumlah Bayar</th>
                            <th>Tanggal Bayar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($angsurans as $angsuran)
                        <tr>
                            <td>{{ $angsuran->kode_angsuran }}</td>
                            <td>{{ $angsuran->pinjaman->kode_pinjaman ?? '-' }}</td>
                            <td>{{ $angsuran->pinjaman->anggota->nama ?? '-' }}</td>
                            <td>{{ $angsuran->ke_angsuran }}</td>
                            <td>Rp {{ number_format($angsuran->jumlah_bayar, 0, ',', '.') }}</td>
                            <td>{{ $angsuran->tanggal_bayar }}</td>
                            <td>
                                <a href="{{ route('angsurans.edit', $angsuran->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('angsurans.destroy', $angsuran->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center">Belum ada data angsuran.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>