<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "web_berita";

$conect = mysqli_connect($host, $username, $password, $database);

if (!$conect) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
