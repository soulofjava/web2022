<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status Peminjaman</title>
</head>
<body>
    <p>Halo, {{ $data->nama }}</p>

    <p>Status peminjaman ruangan Anda telah diperbarui menjadi <b>{{ $data->statuse->code_nm }}</b></p>

    <ul>
        <li><strong>Tanggal:</strong> {{ $data->tanggal }}</li>
        <li><strong>Nama Kegiatan:</strong> {{ $data->kegiatan }}</li>
        <li><strong>Catatan:</strong> {{ $data->catatan }}</li>
    </ul>

    <p>Terima kasih.</p>
</body>
</html>
