<?php
include 'koneksi.php';

if (isset($_POST['edit'])) {
    // Ambil data dari form
    $id_pengaduan = $_POST['id_pengaduan'];
    $tgl_tanggapan = $_POST['tgl_tanggapan'];
    $tanggapan = $_POST['tanggapan'];
    

    // Query untuk memasukkan data ke dalam tabel tanggapan
    $query = "INSERT INTO tanggapan (id_pengaduan, tgl_tanggapan, tanggapan) VALUES (?, ?, ?)";
    
    // Persiapkan statement
    $stmt = mysqli_prepare($conn, $query);

    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, 'iss', $id_pengaduan, $tgl_tanggapan, $tanggapan);

    // Eksekusi statement
    $result = mysqli_stmt_execute($stmt);

    // Cek hasil eksekusi
    if ($result) {
        // Jika berhasil, kembalikan ke halaman tabeltanggapan.php
        echo "<div class='alert alert-success' >Data berhasil di simpan!</div> ";
        header("Location: show_tanggapan.php");
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($conn);
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}
?>