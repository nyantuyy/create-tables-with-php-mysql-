<?php
include 'koneksi.php';

// Check if id_pengaduan is set in the URL
if(isset($_GET["id_pengaduan"])) {
    $id_pengaduan = $_GET["id_pengaduan"];
    $query = "SELECT * FROM pengaduan WHERE id_pengaduan='$id_pengaduan'";
    $result = mysqli_query($koneksi, $query);

    // Check if there are results
    if($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Pengaduan</title>
</head>
<style>
        body {
            margin: 0;
            padding: 0;
            background: url('johanes.jpg');
            background-size: cover;
            font-family: 'Source Sans Pro', sans-serif;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            flex-direction: column;
        }

        h1 {
            color: #000080; /* Warna gelap yang cocok dengan latar belakang biru */
            margin-bottom: 20px;
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            margin-right: 20px;
        }

        label {
            margin-bottom: 10px;
            margin-right: 5px;
            color: white;
        }

        input {
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
            background-color: #FFA500;
            border: none; /* Hapus border */
            color: #000080; /* Warna gelap yang cocok dengan latar belakang biru */
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #FFD700;
        }

        /* Gaya tabel */
        table {
            width: 80%;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            background-color: white; /* Warna latar belakang putih pada tabel */
            color: #000080; /* Warna gelap yang cocok dengan latar belakang biru */
        }

        th, td {
            border: none;
            padding: 8px;
            text-align: left;
            color: #000080; /* Warna gelap yang cocok dengan latar belakang biru */
        }

        th {
            background: ##2a64bd;
; /* Warna pink untuk header */
        }

        tr.middle-line td {
            border-top: 2px solid #FF69B4;
            border-bottom: 2px solid #FF69B4;
        }

        /* Gaya tombol Tanggapi */
        a.tanggapi-button {
            background-color: #FFA500;
            color: #000080; /* Warna gelap yang cocok dengan latar belakang biru */
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        a.tanggapi-button:hover {
            background-color: #FFD700;
        }

        /* Gaya untuk tulisan berubah warna biru saat diklik */
        a:visited {
            color: blue;
        }
    </style>
<body>
    <h1>Foto Bukti Pengaduan ID : <?= $row["id_pengaduan"] ?></h1>
    <p>Tanggal Pengaduan: <?= $row["tgl_pengaduan"] ?></p>
    <p>NIK: <?= $row["NIK"] ?></p>
    <p>Isi Laporan: <?= $row["isi_laporan"] ?></p>
    <p>Foto Bukti Pengaduan:</p>
    <img src='<?= $row["foto"] ?>' alt='Bukti Pengaduan' width='350px'/>

    <br>
    <a href="tampilpengaduanmasyarakat.php">Kembali</a>
</body>
</html>
<?php
    } else {
        echo "No results found for the given id_pengaduan.";
    }
} else {
    echo "id_pengaduan is not set in the URL.";
}
?>
