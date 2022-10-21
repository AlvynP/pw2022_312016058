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
</head>

<body>
  <h3>Data</h3>
  <table border="1" cellpadding="10" cellspasicing="0">
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
          <td><img src="img/<?= $d['gambar']; ?>" width="60" alt=""></td>
          <td><?= $d['nama']; ?></td>
          <td>
            <a href="detail.php?id=<?= $d['id']; ?>">Details</a>
          </td>
        </tr>
      </tbody>
    <?php endforeach; ?>
  </table>
</body>

</html>