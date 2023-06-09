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
    <h1>BERITA</h1>
    <a href="inputberita.php" title="Tambah Berita">Tambah Berita </a>
    <table border="1" width="100%">
        <tr>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Deskripsi</th>
            <th>Penulis</th>
            <th>Tgl Posting</th>
            <th>Gambar</th>
            <th>Actions</th>
        </tr>
        <?php
        // Mengambil data berita dari database
        $query = mysqli_query($conect, "SELECT * FROM tb_berita, tb_kategori, tb_admin where tb_berita.id_Kategori=tb_kategori.id_Kategori and tb_berita.id_admin=tb_admin.id_admin");
        while ($row = mysqli_fetch_assoc($query)) {
            // Menampilkan data berita ke dalam baris tabel
            echo "<tr>";
            echo "<td>".$row['judul']."</td>";
            echo "<td>".$row['Kategori']."</td>";
            echo "<td>".$row['text_berita']."</td>";
            echo "<td>".$row['username']."</td>";
            echo "<td>".$row['tgl_posting']."</td>";
            echo "<td><img src='".$row['gambar']."' width='100' height='100'></td>";
            echo "<td>";
            echo "<a href='edit.php?id=".$row['id']."'>Edit</a> | ";
            echo "<a href='hapus.php?id=".$row['id']."'>Hapus</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>


                

</div>
    <div class="konten-kanan">
                <!-- Tambahkan konten kanan di sini -->
            </div>
            <div style="clear:both;"></div>
        </div>
        <?php include "footer.php"; ?>
