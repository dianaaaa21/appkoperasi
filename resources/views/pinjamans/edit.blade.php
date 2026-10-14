<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pinjaman - Koperasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Edit Data Pinjaman</h4>
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

                        <form action="{{ route('pinjamans.update', $pinjaman->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kode_pinjaman" class="form-label">Kode Pinjaman</label>
                                <input type="text" class="form-control" id="kode_pinjaman" name="kode_pinjaman" value="{{ old('kode_pinjaman', $pinjaman->kode_pinjaman) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="anggota_id" class="form-label">Anggota</label>
                                <select class="form-control" id="anggota_id" name="anggota_id" required>
                                    <option value="">-- Pilih Anggota --</option>
                                    @foreach($anggotas as $anggota)
                                        <option value="{{ $anggota->id }}" {{ $pinjaman->anggota_id == $anggota->id ? 'selected' : '' }}>
                                            {{ $anggota->kode_anggota }} - {{ $anggota->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah_pinjaman" class="form-label">Jumlah Pinjaman (Rp)</label>
                                <input type="number" class="form-control" id="jumlah_pinjaman" name="jumlah_pinjaman" value="{{ old('jumlah_pinjaman', $pinjaman->jumlah_pinjaman) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="bunga" class="form-label">Bunga (%)</label>
                                <input type="number" step="0.01" class="form-control" id="bunga" name="bunga" value="{{ old('bunga', $pinjaman->bunga) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="lama_angsuran" class="form-label">Lama Angsuran (Bulan)</label>
                                <input type="number" class="form-control" id="lama_angsuran" name="lama_angsuran" value="{{ old('lama_angsuran', $pinjaman->lama_angsuran) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam" value="{{ old('tanggal_pinjam', $pinjaman->tanggal_pinjam) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="Belum Lunas" {{ $pinjaman->status == 'Belum Lunas' ? 'selected' : '' }}>Belum Lunas</option>
                                    <option value="Lunas" {{ $pinjaman->status == 'Lunas' ? 'selected' : '' }}>Lunas</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ route('pinjamans.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>