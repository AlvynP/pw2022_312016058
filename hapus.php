<?php
require 'functions.php';
session_start();

// kembalikan jika tidak ada id di url
if (!isset($_GET['id'])) {
  header('Location: index.php');
  exit;
}


// mengambil id dari url

$id = $_GET['id'];

if (hapus($id) > 0) {
  $_SESSION['eks'] = 'Data berhasil dihapus!';
  header('location: index.php');
  //   echo "<script>
  //     alert('Data berhasil dihapus!'); document.location.href = 'index.php';
  // </script>";
} else {
  echo 'Data gagal dihapus';
}
