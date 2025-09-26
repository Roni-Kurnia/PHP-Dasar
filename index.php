<?php
// mengambil function dari file lain
require 'functions.php';

//menggunakan function untuk menjalankan perintah query 
$games = query ("SELECT * FROM game");
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
                    <a href="#">Edit</a> |
                    <a href="#">Hapus</a>
                </td>
                <td><img src="asset/<?= $game["Poster"] ?>" alt="_<?= $game["Judul"] ?>" style="width: 100px; height: 100px;"></td>
                <td><?= $game["Judul"] ?></td>
                <td><?= $game["Genre"] ?></td>
                <td><?= $game["Tersedia"] ?></td>
                <td><?= $game["Developer"] ?></td>
            </tr>
            <?php $i++; ?><?php endforeach; ?>
    </table>
</body>

</html>