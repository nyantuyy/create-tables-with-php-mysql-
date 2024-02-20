<?php
require_once('koneksi.php');
session_start();

// Initialize variables to store values
$idPengaduan = "";
$isiLaporan = "";
$tglPengaduan = "";
$idPetugas = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get values from the form
    $idPengaduan = $_POST["id_pengaduan"];
    $tanggapan = mysqli_real_escape_string($koneksi, $_POST["tanggapan"]);
    $tglPengaduan = $_POST["tgl_pengaduan"];

    // Get id_petugas from session
    $idPetugas = $_SESSION['id_petugas'];

    // Insert the response into the database
    $insertQuery = "INSERT INTO tanggapan (id_pengaduan, tanggapan, tgl_tanggapan, id_petugas) VALUES ('$idPengaduan', '$tanggapan', NOW(), '$idPetugas')";
    $insertResult = mysqli_query($koneksi, $insertQuery);

    if ($insertResult) {
        $logMessage = "ID Pengaduan: $idPengaduan - Tanggapan: $tanggapan - Tanggal Tanggapan: " . date("Y-m-d H:i:s") . PHP_EOL;
        file_put_contents('response_log.txt', $logMessage, FILE_APPEND);
    
        echo '<script>window.location.href = "tampilpengaduanmasyarakat.php";</script>';
    } else {
        echo '<script>window.location.href = "tampilpengaduanmasyarakat.php";</script>';

    }
    
}

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    // Get the ID from the URL
    $idPengaduan = $_GET['id'];

    // Retrieve data from the pengaduan table
    $selectQuery = "SELECT isi_laporan, tgl_pengaduan FROM pengaduan WHERE id_pengaduan = '$idPengaduan'";
    $selectResult = mysqli_query($koneksi, $selectQuery);

    if ($selectResult && mysqli_num_rows($selectResult) > 0) {
        $row = mysqli_fetch_assoc($selectResult);
        $isiLaporan = $row['isi_laporan'];
        $tglPengaduan = $row['tgl_pengaduan'];

    } else {

        echo '<p>Failed to retrieve report data. Please try again.</p>';
    }
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tanggapi</title>
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

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px; /* Adjusted margin for better spacing */
        }

        label {
            margin-bottom: 10px;
            color: white; /* Set label text color to white */
        }

        input,
        textarea {
            padding: 8px;
            margin-bottom: 10px;
        }

        button {
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

        button:hover {
            background-color: #FFD700;
        }
    </style>
</head>

<body>
    <h1>Form Tanggapi Pengaduan</h1>

    <form action="" method="post">
        <label for="id_pengaduan">ID Pengaduan:</label>
        <input type="text" id="id_pengaduan" name="id_pengaduan" value="<?php echo $idPengaduan; ?>" readonly>

        <label for="isi_laporan">Isi Laporan:</label>
        <textarea id="isi_laporan" name="isi_laporan" readonly><?php echo $isiLaporan; ?></textarea>

        <label for="tgl_pengaduan">Tanggal Pengaduan:</label>
        <input type="text" id="tgl_pengaduan" name="tgl_pengaduan" value="<?php echo $tglPengaduan; ?>" readonly>

        <!-- Add a hidden input for the date -->
        <input type="hidden" id="hidden_tgl_pengaduan" name="hidden_tgl_pengaduan" value="<?php echo $tglPengaduan; ?>">

        <label for="tanggapan">Tanggapan:</label>
        <textarea id="tanggapan" name="tanggapan" required></textarea>

        <button type="submit">Submit</button>
    </form>
</body>

</html>
