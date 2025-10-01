<?php 
require "functions.php";

// cek apakah tombol sudah dieksekusi dan mengambil semua data dan memasukannya ke function tambah
if(isset($_POST["submit"]) ) {
    // jika nilai pengembalian lebih dari 0 maka akan mengubah data dan mengikrimkan konfirmasi
    if(tambah($_POST) > 0) {
        echo "<script> alert('data berhasil ditambahkan');  document.location.href = 'index.php'; </script>";
    } else {
        echo "<script> alert('data gagal ditambahkan');  document.location.href = 'index.php'; </script>";
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
    <h1>Tamabahkan data</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="judul">Judul: </label>
                <input type="text" name="judul" id="judul" require>
            </li>
            <li>
                <label for="genre">Genre: </label>
                <input type="text" name="genre" id="genre" required>
            </li>
            <li>
                <label for="tersedia">Tersedia: </label>
                <input type="text" name="tersedia" id="tersedia" required>
            </li>
            <li>
                <label for="developer">Developer: </label>
                <input type="text" name="developer" id="developer" required>
            </li>
            <li>
                <label for="poster">Poster: </label>
                <input type="file" name="poster" id="poster">
            </li>
            <li><button type="submit" name="submit">Kirim</button></li>
        </ul>
    </form>
</body>
</html>