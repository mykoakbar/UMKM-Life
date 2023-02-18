<?php

require 'functions.php';

$rows = query("SELECT * FROM ls_produk");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data Upload Produk</h1>
    <a href="tambah.php"> Tambah Data</a>
    <br>
    <br>
    <table border="1" cellpadding=10 cellspacing=0>
        <thead>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Jenis Produk</th>
            <th>Harga</th>
            <th>Tanggal Upload</th>
            <th>Aksi</th>
        </thead>
        <tbody>
        <?php foreach ($rows as $row) :?>
            <tr>
                <td><?php echo $row ["ID"]?></td>
                <td><?php echo $row ["Nama_Produk"]?></td>
                <td><?php echo $row ["Jenis_Produk"]?></td>
                <td><?php echo $row ["Harga"]?></td>
                <td><?php echo $row ["Tanggal_Upload"]?></td>
                <td>
                <a href="ubah.php?id= <?php echo $row ["id"]?>">ubah | </a>
                <a href="hapus.php?id= <?php echo $row ["id"]?>"onclick="return confirm
                ('Apakah And yakin akan menghapus data?')">hapus</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>
</body>



</html>