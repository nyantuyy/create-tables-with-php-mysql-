<?php
include('koneksi.php');

$id_tanggapan = $_GET['id_tanggapan'];
$delete = "DELETE from tanggapan WHERE id_tanggapan = '$id_tanggapan'";

if($conn->query($delete)) {
header ("location:show_tanggapan.php");
} else {
	echo "data gagal dihapus!!!";
}
?>