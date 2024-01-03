<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Permohonan Peminjaman Akun Zoom</title>
</head>

<body>

    <div class="container mt-5">
        <h2>Formulir Contoh</h2>
        <form method="get" action="{{ url('/create-meeting') }}">
            <div class="mb-3">
                <label for="topik" class="form-label">Topik:</label>
                <input type="text" class="form-control" name="topik">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label for="instansi" class="form-label">Instansi:</label>
                <input type="text" class="form-control" name="instansi">
            </div>
            <div class="mb-3">
                <label for="tanggal" class="form-label">Tanggal:</label>
                <input type="date" class="form-control" name="tanggal">
            </div>
            <div class="mb-3">
                <label for="jam-mulai" class="form-label">Jam Mulai:</label>
                <input type="time" class="form-control" name="jam_mulai">
            </div>
            <div class="mb-3">
                <label for="jam-selesai" class="form-label">Jam Selesai:</label>
                <input type="time" class="form-control" name="jam_selesai">
            </div>
            <div class="mb-3">
                <label for="nomor-whatsapp" class="form-label">Nomor WhatsApp:</label>
                <input type="tel" class="form-control" name="nomor_whatsapp">
                <small id="nomor-whatsapp-help" class="form-text text-muted">Masukkan nomor WhatsApp Anda dengan kode
                    negara.</small>
            </div>
            <button type="submit" class="btn btn-primary">Kirim</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>