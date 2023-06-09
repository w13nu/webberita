<?php 
error_reporting(0);
session_start();
include "../koneksi.php";

$user = $_POST['user'];
$pass = $_POST['pass'];

$passmd5 = md5($pass);

if(isset($_POST['submit'])){
    if($user == ""){
        $user_error = "<span style='color:#fff;'>User wajib diisi</span>";
    }elseif($pass == ""){
        $pass_error =  "<span style='color:#fff;'>Password wajib diisi</span>";
    }else{
        $cekadmin = mysqli_query($conect, "SELECT * FROM tb_admin where username= '$user' and password='$passmd5'");
        $row =mysqli_fetch_array($cekadmin);
        $idadmin = $row['id_admin'];
        $ada = mysqli_num_rows($cekadmin);
        if($ada > 0){
            $_SESSION['webportal']=$user;
            $_SESSION['webportal']=$idadmin;
            echo  "<script>alert('Selamat datang ! ');document.location='home.php'</script>";
        }else{
            $pass_error =  "<span style='color:#fff;'>User &Password Salah</span>";
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

    <div class="konten">
            <div class="konten-kiri">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <table class="login">
                        <tr>
                            <th>
                                <h2>LOGIN ADMIN</h2>
                            </th>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" name="user" placeholder="Masukkan User Admin" class="input" value="<?= $user; ?>">
                                <?= $user_error; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="password" name="pass" placeholder="Masukkan password Admin" class="input">
                                <?= $pass_error; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <button type="submit" name="submit">LOGIN</button>
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
