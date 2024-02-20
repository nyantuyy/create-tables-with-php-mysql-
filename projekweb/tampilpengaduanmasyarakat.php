<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil Pengaduan Masyarakat</title>
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
</head>

<body>
    <h1>Tampil Pengaduan Masyarakat</h1>
    <form action="" align="center" method="post">
        Cari Berdasarkan
        <select name="search">
            <option value="id_pengaduan">id pengaduan</option>
            <option value="tgl_pengaduan">tgl pengaduan</option>
            <option value="NIK">NIK</option>
            <option value="isi_laporan">isi laporan</option>
        </select>
        <input type="text" name="keyword" size="24" />
        <input type="submit" name="cari" class="tanggapi-button" value="cari" />
        <input type="submit" name="semua" class="tanggapi-button" value="Tampilkan Semua" />
    </form>

    <?php
    require_once('koneksi.php');
    session_start();

    // Check if the user is logged in
    if (!isset($_SESSION['id_petugas'])) {
        header("Location: loginadmin.php");
        exit();
    }

    // Get the petugas information from the session
    $idPetugas = $_SESSION['id_petugas'];

    // Set default query to retrieve all records
    $query = "SELECT * FROM pengaduan";
    $result = mysqli_query($koneksi, $query);

    // Handle form submissions
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["semua"])) {
            // If "Tampilkan Semua" button is clicked, retrieve all records
            $query = "SELECT * FROM pengaduan";
        } else {
            $searchBy = $_POST["search"];
            $keyword = mysqli_real_escape_string($koneksi, $_POST["keyword"]);

            $query = "SELECT * FROM pengaduan WHERE $searchBy = '$keyword'";
        }

        $result = mysqli_query($koneksi, $query);
    }

    ?>

    <?php
    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th>ID Pengaduan</th><th>NIK</th><th>Tanggal Pengaduan</th><th>Isi Laporan</th><th>Aksi</th></tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="middle-line">';
            echo '<td>' . $row['id_pengaduan'] . '</td>';
            echo '<td>' . $row['NIK'] . '</td>';
            echo '<td>' . $row['tgl_pengaduan'] . '</td>';
            echo '<td>' . $row['isi_laporan'] . '</td>';
            echo '<td><a class="tanggapi-button" href="tanggapi.php?id=' . $row['id_pengaduan'] . '&id_petugas=' . $idPetugas . '">Tanggapi</a></td>';
            echo '<td><a href="view.php?id_pengaduan=' . $row['id_pengaduan'] . '">View Pengaduan</a></td>';
            echo '</tr>';
        }

        echo '</table>';

        // Add the button form to redirect to tabletanggapan.php
        echo '<form action="tabletanggapan.php" method="get">';
        echo '<button class="tanggapi-button" type="submit">Lihat Tanggapan</button>';
        echo '</form>';
    } else {
        echo '<p>Tidak ada data pengaduan.</p>';
    }

    mysqli_close($koneksi);
    ?>
</body>

</html>
