<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Status Peminjaman</title>
</head>
<body>
    <p>Halo,</p>

    <p>Status peminjaman Anda telah diperbarui:</p>

    <ul>
        <li><strong>Status:</strong> {{ $data->status }}</li>
        <li><strong>Catatan:</strong> {{ $data->catatan }}</li>
    </ul>

    <p>Terima kasih.</p>
</body>
</html>
