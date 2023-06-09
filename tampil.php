<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tampil data dari database</title>
</head>
<body>

<?php
include "koneksi.php";
include "fungsi.php";
?>
<table border="1" width="800px" align="center">
    <thead>
        <tr>
            <th colspan="6"><h3>Data User</h3></th>
        </tr>
        <tr>
             <th>No</th>
             <th>Nama</th>
             <th>Mulai Kerja</th>
             <th>Selesai Kerja</th>
             <th>Lama Kerja</th>
             <th>Honor</th>
        </tr>
    </thead> 
    <tbody>
    <?php
    $data = mysqli_query($conect, "select * from tb_user");
    while($row = mysqli_fetch_array($data)){
    ?>
         <tr>
            <td><?= $row['id_user'];?></td>
            <td><?= strtoupper($row['nama']);?></td>
            <td><?= $row['tgl_mulainya'];?></td>
            <td><?= $row['tgl_selesaikerja'];?></td>
            <td><?= $row['lamakerja'];?></td>
            <td><?= nominal($row['honor']);?></td>
        </tr>
    <?php } ?>
    </tbody>
</table>  
</body>
</html>