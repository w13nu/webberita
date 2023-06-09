<?php
error_reporting(0);
session_start();
include "../koneksi.php";
$sesiadmin = $_SESSION['owner'];
$admin = mysqli_fetch_array(mysqli_query($conect, "select * from tb_admin where id_admin= '$sesiadmin'"));

$judul = mysqli_real_escape_string($conect, $_POST['judul']);
$isi = mysqli_real_escape_string($conect, $_POST['isi']);
$Kategori = mysqli_real_escape_string($conect, $_POST['Kategori']);

$foto = $_FILES['gambar']["tmp_name"];
$namafoto = $_FILES['gambar']["name"];

if(isset($_POST['submit'])){
    if($judul == ""){
        $judul_error = "<span style='color:red;'>Judul wajib diisi</span>";
    } elseif($Kategori == ""){
        $Kategori_error =  "<span style='color:red;'>Kategori wajib diisi</span>";
    } elseif($isi == ""){
        $isi_error =  "<span style='color:red;'>Deskripsi wajib diisi</span>";
    } elseif(empty($namafoto)){
        $gambar_error =  "<span style='color:red;'>Gambar wajib diisi</span>";
    } else {
        // Simpan gambar ke dalam folder berita
        move_uploaded_file($namafoto, '../assets/images/berita/');
        // Simpan data ke database
        $tgl = date('Y-m-d H:i:s');
        $sql = mysqli_query($conect, "INSERT INTO tb_berita (judul, text_berita, id_admin, id_Kategori, tgl_posting, dilihat, gambar) VALUES ('$judul', '$isi', '$sesiadmin', '$Kategori', '$tgl', '1', '$namafoto');");
        if($sql){
            echo "<script>alert('Input berhasil');document.location='berita.php'</script>";
        } else {
            $gambar_error =  "<span style='color:red;'>Terjadi kesalahan sistem, coba lagi</span>";
        }
    }
}
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
            <p>Berita terkini dan terupdate di kalangan Mahasiswa</p>
        </div>
        <div class="menu">
        <ul>
                <li><a href="home.php" title="Home">Home</a></li>
                <li><a href="berita.php" title="Berita">Berita</a></li>
                <li><a href="logout.php" title="Logout">Logout</a></li>
            </ul>
        </div>
    
        <div class="konten">
            <div class="konten-kiri">
                <h1>TAMBAH BERITA</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Judul Berita</td> 
                            <td>
                                <input type="text" name="judul" placeholder="Masukkan Judul" class="input" value="<?= $judul; ?>">
                                <?= $judul_error; ?>
                            </td>
                        </tr>
                        <tr>
                         <td>Kategori Berita</td> 
                        <td>
             <select name="Kategori">                   
                 <option value="">-- Pilih Kategori --</option>
                                    <?php
                                    $sql = mysqli_query($conect,"SELECT * FROM tb_kategori");
                                    while($row = mysqli_fetch_array($sql)){
                                        if($row['id_Kategori'] == $Kategori) { 
                                            ?>
                                            <option value="<?=$row['id_Kategori'];?>" selected="selected"><?=$row['Kategori'];?></option>
                                        <?php } else { ?>
                                            <option value="<?=$row['id_Kategori'];?>"><?=$row['Kategori'];?></option> 
                                        <?php }
                                    }
                                    ?>
                                </select>
                                <?= $Kategori_error; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Deskripsi Berita</td> 
                            <td>
                                <textarea name="isi" rows="4" cols="40" placeholder="Isi berita"><?= $isi; ?></textarea>
                                <?= $isi_error; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Sampul Berita</td> 
                            <td>
                                <input type="file" name="gambar" accept=".jpg, .png, .JPEG, .JPG, .PNG">
                                <?= $gambar_error; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="submit">SIMPAN</button>
                            </td>
                        </tr>
                                </table>
</form>
</div>


                

</div>
    <div class="konten-kanan">
                <!-- Tambahkan konten kanan di sini -->
            </div>
            <div style="clear:both;"></div>
        </div>
        <?php include "footer.php"; ?>