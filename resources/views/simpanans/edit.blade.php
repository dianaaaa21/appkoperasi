<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Simpanan - Koperasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Edit Data Simpanan</h4>
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

                        <form action="{{ route('simpanans.update', $simpanan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="kode_simpanan" class="form-label">Kode Simpanan</label>
                                <input type="text" class="form-control" id="kode_simpanan" name="kode_simpanan" value="{{ old('kode_simpanan', $simpanan->kode_simpanan) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="anggota_id" class="form-label">Anggota</label>
                                <select class="form-control" id="anggota_id" name="anggota_id" required>
                                    <option value="">-- Pilih Anggota --</option>
                                    @foreach($anggotas as $anggota)
                                        <option value="{{ $anggota->id }}" {{ $simpanan->anggota_id == $anggota->id ? 'selected' : '' }}>
                                            {{ $anggota->kode_anggota }} - {{ $anggota->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jenis_simpanan" class="form-label">Jenis Simpanan</label>
                                <select class="form-control" id="jenis_simpanan" name="jenis_simpanan" required>
                                    <option value="Pokok" {{ $simpanan->jenis_simpanan == 'Pokok' ? 'selected' : '' }}>Pokok</option>
                                    <option value="Wajib" {{ $simpanan->jenis_simpanan == 'Wajib' ? 'selected' : '' }}>Wajib</option>
                                    <option value="Sukarela" {{ $simpanan->jenis_simpanan == 'Sukarela' ? 'selected' : '' }}>Sukarela</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="jumlah" class="form-label">Jumlah (Rp)</label>
                                <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah', $simpanan->jumlah) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $simpanan->tanggal) }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ route('simpanans.index') }}" class="btn btn-secondary">Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>