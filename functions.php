<?php

function conn()
{
  return mysqli_connect('localhost', 'root', '', 'doc');
}

function query($query)
{
  $conn = conn();

  $result = mysqli_query($conn, $query);

  // jika hasilnya hanya satu data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = conn();

  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $hp = htmlspecialchars($data['hp']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "INSERT INTO data VALUES 
  (null, '$nama', '$email', '$hp', '$gambar')";


  mysqli_query($conn, $query);

  echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}
