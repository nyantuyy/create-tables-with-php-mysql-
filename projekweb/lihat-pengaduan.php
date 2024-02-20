<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Pengaduan</title>
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
            color: #FFD700;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
        }

        th,
        td {
            border: none;
            padding: 8px;
            text-align: left;
            color: white;
        }

        th {
            background-color: #333;
        }

        tr.middle-line td {
            border-bottom: 2px solid #fff;
            /* White line */
        }
    </style>
</head>

<body>
    <h1>Data Pengaduan Masyarakat</h1>

    <?php
    require_once('koneksi.php');

    $query = "SELECT tgl_pengaduan, isi_laporan FROM pengaduan";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th>No</th><th>Tanggal Pengaduan</th><th>Isi Laporan Pengaduan</th></tr>';

        $counter = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="middle-line">';
            echo '<td>' . $counter . '</td>';
            echo '<td>' . $row['tgl_pengaduan'] . '</td>';
            echo '<td>' . $row['isi_laporan'] . '</td>';
            echo '</tr>';
            $counter++;
        }

        echo '</table>';
    } else {
        echo '<p>Tidak ada data pengaduan.</p>';
    }

    mysqli_close($koneksi);
    ?>
</body>

</html>
