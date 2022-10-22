<?php
// koneksi file
require 'functions.php';

// tampung ke dalam variabel
$data = query("SELECT * FROM data");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="w3schools/style.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div class="container">
    <h3>Data</h3>
    <span><a href="tambah.php"><button class="w3-button w3-blue">Tambah Data</button></a></span>
    <div class="tex">
      <table id="customers" border="1" cellpadding="10" cellspasicing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>Gambar</th>
            <th>Nama</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <?php $i = 1;
        foreach ($data as $d) : ?>
          <tbody>
            <tr>
              <td><?= $i++; ?></td>
              <td><img src="img/<?= $d['gambar']; ?>" alt=""></td>
              <td><?= $d['nama']; ?></td>
              <td>
                <a href="detail.php?id=<?= $d['id']; ?>"><button class="w3-button w3-blue">Details</button></a>
              </td>
            </tr>
          </tbody>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</body>

</html>