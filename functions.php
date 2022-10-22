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
  (null, '$gambar', '$nama', '$email', '$hp')";


  mysqli_query($conn, $query) or die(mysqli_error($conn));

  // echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = conn();
  mysqli_query($conn, "DELETE FROM data WHERE id = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}


function ubah($data)
{
  $conn = conn();

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $email = htmlspecialchars($data['email']);
  $hp = htmlspecialchars($data['hp']);
  $gambar = htmlspecialchars($data['gambar']);

  $query = "UPDATE data SET nama = '$nama', email = '$email', hp = '$hp', gambar = '$gambar' WHERE id = $id";


  mysqli_query($conn, $query) or die(mysqli_error($conn));

  // echo mysqli_error($conn);

  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = conn();

  $query = "SELECT * FROM data WHERE nama LIKE '%$keyword%' OR hp LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}


function login($data)
{
  $conn = conn();

  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);

  if (query("SELECT * FROM user WHERE username = '$username' && password = '$password'")) {

    // set session
    $_SESSION['login'] = true;

    header('Location: index.php');
    exit;
  } else {
    return [
      'error' => true,
      'pesan' => 'Username / Password salah!'
    ];
  }
}
