<?php 
error_reporting(0);
session_start();
include "../koneksi.php";
$sesiadmin = $_SESSION['owner'];
$admin = mysqli_fetch_array(mysqli_query($conect, "select * from tb_admin where id_admin= '$sesiadmin'"));


?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita Mahasiswa</title>
<link rel="stylesheet" href="../assets/css/style.css" type="text/css"> 
</head>
<body>

    <div id="container">

    <div class="header">
            <h1>Admin - Portal Berita Mahasiswa PNM</h1>
            <p>Berita terkini dan terupdate dikalangan Mahasiswa</p>
        </div>
        <div class="menu">
        <ul>
            <li><a href="home.php" title="Home">Home</a></li>
            <li><a href="berita.php" title="Home">Berita</a></li>
            <li><a href="logout.php" title="Login">Logout</a></li>
    </ul>
    </div>
    
    <div class="konten">
            <div class="konten-kiri">
                <h1>Selamat datang <?= $admin['nama_lengkap'];?> di ruang admin !</h1>           
</div>
    <div class="konten-kanan">
                <!-- Tambahkan konten kanan di sini -->
            </div>
            <div style="clear:both;"></div>
        </div>
        <?php include "footer.php"; ?>
