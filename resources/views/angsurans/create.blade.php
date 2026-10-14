<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Angsuran - Koperasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Tambah Data Angsuran</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('angsurans.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="kode_angsuran" class="form-label">Kode Angsuran</label>
                                <input type="text" class="form-control" id="kode_angsuran" name="kode_angsuran" value="{{ old('kode_angsuran') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="pinjaman_id" class="form-label">Pinjaman (Anggota)</label>
                                <select class="form-control" id="pinjaman_id" name="pinjaman_id" required>
                                    <option value="">-- Pilih Pinjaman --</option>
                                    @foreach($pinjamans as $pinjaman)
                                        <option value="{{ $pinjaman->id }}">
                                            {{ $pinjaman->kode_pinjaman }} - {{ $pinjaman->anggota->nama ?? '-' }} (Rp {{ number_format($pinjaman->jumlah_pinjaman, 0, ',', '.') }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="ke_angsuran" class="form-label">Angsuran Ke-</label>
                                <input type="number" class="form-control" id="ke_angsuran" name="ke_angsuran" value="{{ old('ke_angsuran') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_bayar" class="form-label">Jumlah Bayar (Rp)</label>
                                <input type="number" class="form-control" id="jumlah_bayar" name="jumlah_bayar" value="{{ old('jumlah_bayar') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_bayar" class="form-label">Tanggal Bayar</label>
                                <input type="date" class="form-control" id="tanggal_bayar" name="tanggal_bayar" value="{{ old('tanggal_bayar') }}" required>
                            </div>

                            <button type="submit" class="btn btn-success">Simpan</button>
                            <a href="{{ route('angsurans.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>