<?php 
include "koneksi.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal Berita Mahasiswa</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">

    <div id="container">

    <div class="header">
            <h1>Portal Berita Mahasiswa PNM</h1>
            <p>Berita terkini dan terupdate dikalangan Mahasiswa</p>
        </div>
        <div class="menu">
        <ul>
            <li><a href="index.php" title="Home">Beranda</a></li>
            <li><a href="" title="Home">Berita</a></li>
            <li><a href="admin/index.php" title="Login">Login Admin</a></li>
    </ul>
    </div>

        <div class="konten"> <!--body web-->
    <div class="konten-kiri">
        <h2>BERITA TERBARU</h2>
        <?php
        $data = mysqli_query($conect, "SELECT * FROM tb_berita, tb_admin where tb_berita.id_admin=tb_admin .id_admin ORDER BY id_berita DESC");
        while ($row = mysqli_fetch_array($data)) {
        ?>
        <div class="feedberita">
            <div class="feedberita">
         <a href=""><h3><?= $row['judul']; ?></h3></a>
         <hr>
         <img src="gambar/<?= $row['gambar']; ?>" alt="<?= $row['judul']; ?>" style="width: 150px; height: 150px; float: left; margin: 10px;">
    

            <h3><?= $row['judul'];?></h3>
            <hr>
            <p><?=substr($row['text_berita'],0,150);?>...<a href="">Baca Selengkapnya</a></p>
            <p>Diposting oleh :<?=$row['nama_lengkap'];?> , Tanggal : <?= $row['tgl_posting'];?></p>
        </div>
        <?php } ?>
    </div>
</div>

    <div class="konten-kanan">
                <!-- Tambahkan konten kanan di sini -->
            </div>
            <div style="clear:both;"></div>
        </div>
        <?php include "footer.php"; ?>