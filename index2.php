<?php
// koneksi ke database menggunakan mysqli
$conn= mysqli_connect("localhost", "root", "", "phpdasar");

// ambil data dari tabel game/ menggunakan query
// selama query benar maka akan mengembalikan nilai true dan jika salah akan mengembalikan nilai false 
$result= mysqli_query($conn, "SELECT * FROM game" );

// ambil data (fetch) game dari object result
// mysqli_fetch_row()       // mengembalikan array numerik(angka)
// mysqli_fetch_assoc()     // mengembalikan array assosiatif(string)
// mysqli_fetch_array()     // mengembalikan keduanya
// mysqli_fetch_object()    // mengembalikan dalam bentuk object

// while ($gm= mysqli_fetch_assoc($result)) {
//     var_dump($gm/*["Judul"] menggunakan field jika hanya mau menampilkan satu*/);
// };

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
        <?php while ($gm = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="#">Edit</a> |
                    <a href="#">Hapus</a>
                </td>
                <td><img src="asset/<?= $gm["Poster"] ?>" alt="_<?= $gm["Judul"] ?>" style="width: 100px; height: 100px;"></td>
                <td><?= $gm["Judul"] ?></td>
                <td><?= $gm["Genre"] ?></td>
                <td><?= $gm["Tersedia"] ?></td>
                <td><?= $gm["Developer"] ?></td>
            </tr>
            <?php $i++; ?><?php endwhile; ?>
    </table>
</body>

</html>