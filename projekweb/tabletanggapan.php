<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table Tanggapan</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: url('johanes.jpg'); /* Use the same background image as the first script */
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
            color: #FFD700;
            margin-bottom: 20px;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
            background-color: #333; /* Dark background for the table */
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
            border-bottom: 2px solid #fff; /* White line */
        }

        .action-buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .action-buttons button {
            background-color: #FFA500;
            color: #000080; /* Use the same color as the first script */
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .action-buttons button:hover {
            background-color: #FFD700;
        }
    </style>
</head>

<body>
    <h1>Table Tanggapan</h1>

    <?php
    require_once('koneksi.php');

    // Fetch data from the database
    $query = "SELECT * FROM tanggapan";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<tr><th>ID Tanggapan</th><th>ID Pengaduan</th><th>Tanggal Tanggapan</th><th>Tanggapan</th><th>Aksi</th></tr>';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="middle-line">';
            echo '<td>' . $row['id_tanggapan'] . '</td>';
            echo '<td>' . $row['id_pengaduan'] . '</td>';
            echo '<td>' . $row['tgl_tanggapan'] . '</td>';
            echo '<td>' . $row['tanggapan'] . '</td>';
            echo '<td>';
            echo '<button onclick="editData(' . $row['id_tanggapan'] . ')">Edit</button>';
            echo '<button onclick="deleteData(' . $row['id_tanggapan'] . ')">Delete</button>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>Tidak ada data tanggapan.</p>';
    }

    mysqli_close($koneksi);
    ?>

    <div class="action-buttons">
      
        <button onclick="location.href='form_delete_tanggapan.php'">Hapus Semua Tanggapan</button>
    </div>

    <script>
        function editData(id) {
            // Redirect to the edit form with the selected ID
            window.location.href = 'form_edit_tanggapan.php?id=' + id;
        }

        function deleteData(id) {
            // Redirect to the delete form with the selected ID
            window.location.href = 'form_delete_tanggapan.php?id=' + id;
        }
    </script>
</body>

</html>
