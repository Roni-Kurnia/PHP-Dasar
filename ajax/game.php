<?php
sleep(1);
$keyword = $_GET["keyword"];
require "../functions.php";
$query = "SELECT * FROM game WHERE judul LIKE '%$keyword%' OR genre LIKE '%$keyword%' OR tersedia LIKE '%$keyword%' OR developer LIKE '%$keyword%'";
$games = query($query);
?>

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