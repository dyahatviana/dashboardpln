<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beri Tugas - CS ULP Dukuh Kupang</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f6fa;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
        }

        h1 {
            margin-bottom: 5px;
        }

        .subtitle {
            color: #777;
            margin-bottom: 25px;
        }

        .section-title {
            margin-top: 25px;
            margin-bottom: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .full {
            grid-column: span 2;
        }

        label {
            margin-bottom: 7px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            padding: 11px;
            border: 1px solid #ddd;
            border-radius: 7px;
            font-size: 14px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        .button {
            margin-top: 25px;
            padding: 12px 25px;
            border: none;
            border-radius: 7px;
            background: #2563eb;
            color: white;
            font-size: 15px;
            cursor: pointer;
        }

        .button:hover {
            background: #1d4ed8;
        }

        .error {
            background: #fee2e2;
            color: #991b1b;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        @media (max-width: 700px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .full {
                grid-column: span 1;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Beri Tugas</h1>
    <p class="subtitle">
        Form pemberian tugas dari CS kepada divisi
    </p>

    @if ($errors->any())
        <div class="error">
            <strong>Periksa kembali data:</strong>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/tugas" method="POST">

        @csrf

        <div class="section-title">
            Data Pelanggan
        </div>

        <div class="form-grid">

            <div class="form-group">
                <label>Nama Pelanggan</label>
                <input
                    type="text"
                    name="nama_pelanggan"
                    value="{{ old('nama_pelanggan') }}"
                    placeholder="Masukkan nama pelanggan"
                    required
                >
            </div>

            <div class="form-group">
                <label>ID Pelanggan</label>
                <input
                    type="text"
                    name="id_pelanggan"
                    value="{{ old('id_pelanggan') }}"
                    placeholder="Masukkan ID pelanggan"
                    required
                >
            </div>

            <div class="form-group">
                <label>No. KTP</label>
                <input
                    type="text"
                    name="no_ktp"
                    value="{{ old('no_ktp') }}"
                    placeholder="Masukkan nomor KTP"
                >
            </div>

            <div class="form-group">
                <label>No. KK</label>
                <input
                    type="text"
                    name="no_kk"
                    value="{{ old('no_kk') }}"
                    placeholder="Masukkan nomor KK"
                >
            </div>

            <div class="form-group">
                <label>No. HP</label>
                <input
                    type="text"
                    name="no_hp"
                    value="{{ old('no_hp') }}"
                    placeholder="Masukkan nomor HP"
                >
            </div>

            <div class="form-group full">
                <label>Alamat</label>
                <textarea
                    name="alamat"
                    placeholder="Masukkan alamat pelanggan"
                >{{ old('alamat') }}</textarea>
            </div>

        </div>

        <div class="section-title">
            Detail Permintaan
        </div>

        <div class="form-grid">

            <div class="form-group full">
                <label>Keperluan</label>
                <input
                    type="text"
                    name="keperluan"
                    value="{{ old('keperluan') }}"
                    placeholder="Contoh: Pengaduan gangguan listrik"
                    required
                >
            </div>

            <div class="form-group full">
                <label>Deskripsi / Keterangan</label>
                <textarea
                    name="deskripsi"
                    placeholder="Jelaskan detail permintaan pelanggan"
                >{{ old('deskripsi') }}</textarea>
            </div>

            <div class="form-group">
                <label>Divisi Tujuan</label>
                <select name="divisi" required>
                    <option value="">-- Pilih Divisi --</option>
                    <option value="Teknik">Teknik</option>
                    <option value="Pelayanan">Pelayanan</option>
                    <option value="Administrasi">Administrasi</option>
                </select>
            </div>

            <div class="form-group">
                <label>Prioritas</label>
                <select name="prioritas" required>
                    <option value="rendah">Rendah</option>
                    <option value="sedang" selected>Sedang</option>
                    <option value="tinggi">Tinggi</option>
                </select>
            </div>

            <div class="form-group">
                <label>Deadline</label>
                <input
                    type="date"
                    name="deadline"
                    value="{{ old('deadline') }}"
                >
            </div>

        </div>

        <button type="submit" class="button">
            Kirim Tugas ke Divisi
        </button>

    </form>

</div>

</body>
</html>
