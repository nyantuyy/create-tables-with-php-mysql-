<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Pengaduan Masyarakat</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #000;
            font-family: 'Source Sans Pro', sans-serif;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #FFA500;
            margin-bottom: 20px;
        }

        .form-container {
            background: #111;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius: 5px;
        }

        button {
            background-color: #FFA500;
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px; /* Added margin to separate buttons */
        }

        button:hover {
            background-color: #FFD700;
        }
    </style>
</head>

<body>
    <h1>Portal Pengaduan Masyarakat</h1>
    <div class="form-container">
        <h2>Form Pengaduan Masyarakat</h2>
        <form action="process-form.php" method="post" enctype="multipart/form-data">
    <label for="nik">NIK:</label>
    <input type="text" id="nik" name="nik" required>

    <label for="nama">Nama Lengkap:</label>
    <input type="text" id="nama" name="nama" required>

    <label for="telp">Nomor Telepon:</label>
    <input type="text" id="telp" name="telp" required>

    <label for="tgl_pengaduan">Tanggal Pengaduan:</label>
    <input type="date" id="tgl_pengaduan" name="tgl_pengaduan" required>

    <label for="isi_laporan">Isi Laporan:</label>
    <textarea id="isi_laporan" name="isi_laporan" rows="4" required></textarea>

    <label for="file">Upload Foto:</label>
    <input type="file" name="foto" id="foto" placeholder="Masukkan Foto">


    <button type="submit">Submit</button>

    <a href="lihat-pengaduan.php"><button type="button">Lihat Pengaduan</button></a>
</form>
    </div>   
</body>

</html>
