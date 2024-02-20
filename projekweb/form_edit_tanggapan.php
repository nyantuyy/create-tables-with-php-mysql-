<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tanggapan</title>
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
    <h1>Edit Tanggapan</h1>

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

    // Handle form submission for editing
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $idPengaduan = $_POST["id_pengaduan"];
        $tglTanggapan = $_POST["tgl_tanggapan"];
        $tanggapan = mysqli_real_escape_string($koneksi, $_POST["tanggapan"]);

        $updateQuery = "UPDATE tanggapan SET id_pengaduan = '$idPengaduan', tgl_tanggapan = '$tglTanggapan', tanggapan = '$tanggapan' WHERE id_tanggapan = '$idTanggapan'";
        $updateResult = mysqli_query($koneksi, $updateQuery);

        if ($updateResult) {
            echo '<p>Tanggapan updated successfully.</p>';
        
            // Redirect to tanggapan.php after successful update
            echo '<script>window.location.href = "tabletanggapan.php";</script>';
        } else {
            echo '<p>Failed to update tanggapan. Please try again.</p>';
        }
        
    }
    ?>

    <form action="" method="post">
        <label for="id_pengaduan">ID Pengaduan:</label>
        <input type="text" id="id_pengaduan" name="id_pengaduan" value="<?php echo $idPengaduan; ?>" readonly>

        <label for="tgl_tanggapan">Tanggal Tanggapan:</label>
        <input type="text" id="tgl_tanggapan" name="tgl_tanggapan" value="<?php echo $tglTanggapan; ?>" readonly>

        <label for="tanggapan">Tanggapan:</label>
        <textarea id="tanggapan" name="tanggapan" required><?php echo $tanggapan; ?></textarea>

        <button type="submit">Update Tanggapan</button>
    </form>
</body>

</html>
