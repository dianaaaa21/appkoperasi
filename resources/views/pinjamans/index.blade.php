<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pinjaman - Koperasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4">Daftar Pinjaman Koperasi</h2>
        <a href="{{ route('pinjamans.create') }}" class="btn btn-primary mb-3">+ Tambah Pinjaman</a>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Pinjaman</th>
                            <th>Nama Anggota</th>
                            <th>Jumlah Pinjaman</th>
                            <th>Bunga (%)</th>
                            <th>Lama Angsuran</th>
                            <th>Tanggal Pinjam</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pinjamans as $pinjaman)
                        <tr>
                            <td>{{ $pinjaman->kode_pinjaman }}</td>
                            <td>{{ $pinjaman->anggota->nama ?? '-' }}</td>
                            <td>Rp {{ number_format($pinjaman->jumlah_pinjaman, 0, ',', '.') }}</td>
                            <td>{{ $pinjaman->bunga }}%</td>
                            <td>{{ $pinjaman->lama_angsuran }} Bulan</td>
                            <td>{{ $pinjaman->tanggal_pinjam }}</td>
                            <td>
                                <span class="badge {{ $pinjaman->status == 'Lunas' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $pinjaman->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('pinjamans.edit', $pinjaman->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('pinjamans.destroy', $pinjaman->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data pinjaman.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>