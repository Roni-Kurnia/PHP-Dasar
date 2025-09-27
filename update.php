<?php 
require "functions.php";

// mengambil PRIMARY key yang telah masuk ke url dari hasil query di index,php
$id = $_GET["id"];

$pk = query("SELECT * FROM game WHERE id = $id")[0];

// cek apakah tombol sudah dieksekusi dan mengambil semua data dan memasukannya ke function tambah
if(isset($_POST["submit"]) ) {
    // jika nilai pengembalian lebih dari 0 maka akan mengubah data dan mengikrimkan konfirmasi
    if(ubah($_POST) > 0) {
        echo "<script> alert('data berhasil diubah');  document.location.href = 'index.php'; </script>";
    } else {
        echo "<script> alert('data gagal diubah');  document.location.href = 'index.php'; </script>";
    }
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Update data</h1>
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $pk["id"];?>">
        <ul>
            <li>
                <label for="judul">Judul: </label>
                <input type="text" name="judul" id="judul" value="<?= $pk["judul"];?>">
            </li>
            <li>
                <label for="genre">Genre: </label>
                <input type="text" name="genre" id="genre" value="<?= $pk["genre"];?>">
            </li>
            <li>
                <label for="tersedia">Tersedia: </label>
                <input type="text" name="tersedia" id="tersedia" value="<?= $pk["tersedia"];?>">
            </li>
            <li>
                <label for="developer">Developer: </label>
                <input type="text" name="developer" id="developer" value="<?= $pk["developer"];?>">
            </li>
            <li>
                <label for="poster">Poster: </label>
                <input type="text" name="poster" id="poster" value="<?= $pk["poster"];?>">
            </li>
            <li><button type="submit" name="submit">Kirim</button></li>
        </ul>
    </form>
</body>
</html>