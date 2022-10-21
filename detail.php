<?php
require 'functions.php';

// ambildata dari url
$id = $_GET['id'];

// query data berdasarkan id
$d = query("SELECT * FROM data WHERE id = $id");
// var_dump($d);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail</title>
</head>

<body>
  <h3>Detail Data</h3>
  <ul>
    <li><img src="img/<?= $d['gambar']; ?>" width="60" alt=""></li>
    <li>Nama : <?= $d['nama']; ?></li>
    <li>Email : <?= $d['email']; ?></li>
    <li>No. Hp : <?= $d['hp']; ?></li>
    <li><a href="">Ubah</a> | <a href="">Hapus</a></li>
    <li><a href="index.php">Kembali</a></li>
  </ul>
</body>

</html>