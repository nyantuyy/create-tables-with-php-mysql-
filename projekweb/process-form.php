<?php
// Include the database connection file
require_once('koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nik = mysqli_real_escape_string($koneksi, $_POST["nik"]);
    $nama = mysqli_real_escape_string($koneksi, $_POST["nama"]);
    $telp = mysqli_real_escape_string($koneksi, $_POST["telp"]);
    $tgl_pengaduan = mysqli_real_escape_string($koneksi, $_POST["tgl_pengaduan"]);
    $isi_laporan = mysqli_real_escape_string($koneksi, $_POST["isi_laporan"]);

    $ada = $_FILES['foto']['name'];
    $tipee = pathinfo($ada, PATHINFO_EXTENSION);
    $folder = "img/";
    $folder = $folder . $nama . "." . $tipee;

    // Insert data into 'masyarakat' table
    $queryMasyarakat = "INSERT INTO masyarakat (NIK, nama, telp) VALUES ('$nik', '$nama', '$telp')";
    mysqli_query($koneksi, $queryMasyarakat);

    // Retrieve the auto-incremented ID from the 'masyarakat' table
    $idMasyarakat = mysqli_insert_id($koneksi);

    // Insert data into 'pengaduan' table
    $queryPengaduan = "INSERT INTO pengaduan (tgl_pengaduan, isi_laporan, NIK, foto) VALUES ('$tgl_pengaduan', '$isi_laporan', '$nik', '$folder')";
    
    if (mysqli_query($koneksi, $queryPengaduan)) {
        move_uploaded_file($_FILES['foto']['tmp_name'], $folder);
        echo "<script>alert('Keluhan berhasil dikirim!');
        document.location='lihat-pengaduan.php';
        </script>";
    } else {
        echo "<script>alert('Error inserting data into the database.');
        document.location='index.php';
        </script>";
    }

    // Close the database connection
    mysqli_close($koneksi);

    // Redirect to a thank you page or any other page as needed
    header("Location:lihat-pengaduan.php");
    exit();
} else {
    // Handle the case when the request method is not POST
    header("Location: index.php");
    exit();
}
?>
