<?php
session_start();
require_once('koneksi.php'); // Include the database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the connection is established successfully
    if (!$koneksi) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
    $password = mysqli_real_escape_string($koneksi, $_POST["password"]);

    $query = "SELECT id_petugas, username FROM petugas WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Ambil informasi petugas dari hasil query
        $row = mysqli_fetch_assoc($result);
        $idPetugas = $row["id_petugas"];
        $username = $row["username"];

        // Simpan informasi petugas ke dalam sesi
        $_SESSION["id_petugas"] = $idPetugas;
        $_SESSION["username"] = $username;
        

        // Redirect ke halaman tampilpengaduanmasyarakat.php
        header("Location: tampilpengaduanmasyarakat.php");
        exit();
    } else {
        header("Location: loginadmin.php?error=1");
        exit();
    }
} else {
    // Handle the case when the request method is not POST
    header("Location: loginadmin.php");
    exit();
}

mysqli_close($koneksi); // Close the database connection
?>
