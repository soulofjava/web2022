<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Tempat Mail</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background-color: #f8f8f8;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
            text-align: center;
        }

        p {
            color: #555555;
            margin-bottom: 15px;
        }

        ul {
            padding-left: 20px;
            margin-bottom: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        strong {
            font-weight: bold;
        }

        .thanks {
            margin-top: 20px;
            font-style: italic;
            text-align: center;
            color: #777777;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #999999;
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Selamat!</h1>
        <p>Anda telah berhasil melakukan peminjaman tempat.</p>
        <p>Berikut adalah rincian peminjaman:</p>
        <ul>
            <li><strong>Nama:</strong> {{ $nama }}</li>
            <li><strong>Jenis Kelamin:</strong> {{ $jkel }}</li>
            <li><strong>Usia:</strong> {{ $usia }}</li>
            <li><strong>Pekerjaan:</strong> {{ $pekerjaan }}</li>
            <li><strong>Pendidikan:</strong> {{ $pendidikan }}</li>
            <li><strong>Instansi:</strong> {{ $instansi }}</li>
            <li><strong>Tanggal:</strong> {{ $tanggal }}</li>
            <li><strong>Waktu:</strong> {{ $waktu }}</li>
            <li><strong>Kegiatan:</strong> {{ $kegiatan }}</li>
            <li><strong>Acara:</strong> {{ $acara }}</li>
            <li><strong>Jumlah Peserta:</strong> {{ $jumlah }}</li>
        </ul>
        <p>Data sedang di proses Admin. Silahkan tunggu untuk informasi lebih lanjut.</p>
        <p class="thanks">Terimakasih.</p>
        <p class="footer">Email ini dikirim secara otomatis, jangan balas email ini.</p>
    </div>
</body>

</html>