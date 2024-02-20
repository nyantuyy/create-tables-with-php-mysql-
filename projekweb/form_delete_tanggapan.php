<?php
require_once('koneksi.php');

// Check if ID is provided in the URL
if (isset($_GET['id'])) {
    $idTanggapan = $_GET['id'];

    // Retrieve data from the tanggapan table
    $selectQuery = "SELECT * FROM tanggapan WHERE id_tanggapan = '$idTanggapan'";
    $selectResult = mysqli_query($koneksi, $selectQuery);

    if ($selectResult && mysqli_num_rows($selectResult) > 0) {
        $row = mysqli_fetch_assoc($selectResult);
        $idPengaduan = $row['id_pengaduan'];
        $tglTanggapan = $row['tgl_tanggapan'];
        $tanggapan = $row['tanggapan'];
    } else {
        echo '<p>Failed to retrieve tanggapan data. Please try again.</p>';
        exit();
    }
} else {
    echo '<p>ID Tanggapan is not provided. Please try again.</p>';
    exit();
}

// Handle form submission for deleting
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deleteQuery = "DELETE FROM tanggapan WHERE id_tanggapan = '$idTanggapan'";
    $deleteResult = mysqli_query($koneksi, $deleteQuery);

    if ($deleteResult) {
        echo '<p>Tanggapan deleted successfully.</p>';
        
        // Redirect to tanggapan.php after successful delete
        echo '<script>window.location.href = "tabletanggapan.php";</script>';
    } else {
        echo '<script>window.location.href = "tabletanggapan.php";</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Tanggapan</title>
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

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            background: #000; /* Dark background color for the form */
            padding: 20px;
            border-radius: 10px;
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
            background-color: #FF0000;
            color: white;
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
            background-color: #990000;
        }
    </style>
</head>

<body>
    <h1>Delete Tanggapan</h1>

    <form action="" method="post">
        <label for="id_pengaduan">ID Pengaduan:</label>
        <input type="text" id="id_pengaduan" name="id_pengaduan" value="<?php echo $idPengaduan; ?>" readonly>

        <label for="tgl_tanggapan">Tanggal Tanggapan:</label>
        <input type="text" id="tgl_tanggapan" name="tgl_tanggapan" value="<?php echo $tglTanggapan; ?>" readonly>

        <label for="tanggapan">Tanggapan:</label>
        <textarea id="tanggapan" name="tanggapan" readonly><?php echo $tanggapan; ?></textarea>

        <button type="submit">Delete Tanggapan</button>
    </form>
</body>

</html>
