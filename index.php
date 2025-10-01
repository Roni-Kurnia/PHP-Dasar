<?php
// mengambil function dari file lain
require 'functions.php';

//menggunakan function untuk menjalankan perintah query 
// ORDER BY = mengurutkan dari yang terkecil(ASC) dan mengurutkan dari yang terbesar(DESC)
$games = query ("SELECT * FROM game");

if(isset($_POST["cari"])) {
    $games = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Daftar Game Favorit</h1>
    <a href="add.php">Klik untuk tambah data</a> 
    <br><br> 
    <form action="" method="post">
        <!-- autofocus = langsung berada di pengimputan sesaat setelah melakukan revrase -->
        <!-- palaceholder = memberikan panduan teks yang akan menghilag ketika diketikan sesuatu -->
        <!-- autocomplate = menyembunyikan histori pada tag input -->
        <input type="text" name="keyword"  size="40px" autofocus placeholder="masukan keyword pencarian..." autocomplete="off"> 
        <button type="submit" name="cari">cari</button>
    </form> 
    <br><br> 
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>NO</th>
            <th>Aksi</th>
            <th>Poster</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Tersedia</th>
            <th>Developer</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach ($games as $game) : ?> 
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <!-- aksi berasal dari function, yang mana PRIMARY key dimasukan ke url lewat "file.php?value=" -->
                    <a href="update.php?id= <?= $game["id"];?>">Edit</a> |
                    <a href="delete.php?id= <?= $game["id"];?>" onclick="return confirm('yakin?');">Hapus</a>
                </td>
                <td><img src="asset/<?= $game["poster"] ?>" alt="_<?= $game["judul"] ?>" style="width: 100px; height: 100px;"></td>
                <td><?= $game["judul"] ?></td>
                <td><?= $game["genre"] ?></td>
                <td><?= $game["tersedia"] ?></td>
                <td><?= $game["developer"] ?></td>
            </tr>
            <?php $i++; ?><?php endforeach; ?>
    </table>
</body>

</html>