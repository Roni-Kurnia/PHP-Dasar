<?php 
require "functions.php";

// mengambil PRIMARY key yang telah masuk ke url dari hasil query di index,php
$id = $_GET["id"]; 

// jika nilai pengembalian lebih dari 0 maka akan menghapus data dan mengikrimkan konfirmasi
if (hapus($id) > 0) {
    echo "<script> alert('data berhasil dihapus');  document.location.href = 'index.php'; </script>";
} else {
    echo "<script> alert('data gagal dihapus');  document.location.href = 'index.php'; </script>";
}