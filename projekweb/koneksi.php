<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "projekweb";

$koneksi = new mysqli($server, $username, $password, $db);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}
?>
