<?php
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
};

// memasukan data yang di tangkap kedalam database
function tambah($data) {
    global $conn;
     // validasi data / value
    $judul = htmlspecialchars($data["judul"]);
    $genre = htmlspecialchars($data["genre"]);
    $tersedia = htmlspecialchars($data["tersedia"]);
    $developer = htmlspecialchars($data["developer"]);
    $poster = htmlspecialchars($data["poster"]);
    // insert data
    $query = "INSERT INTO game VALUES ('', '$judul', '$genre', '$tersedia', '$developer', '$poster')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); // meberikan nilai (+1) jika perintah berhasil dijaankan
};

// memasukan data yang di tangkap kedalam database
function hapus($id) {
    global $conn;
    // memeberikan perintah (penghapusan) pada data base
    mysqli_query($conn, "DELETE FROM game WHERE id = $id");
    return mysqli_affected_rows($conn);
}


function ubah($data) {
    global $conn;
     // validasi data / value
    $id = $data["id"];
    $judul = htmlspecialchars($data["judul"]);
    $genre = htmlspecialchars($data["genre"]);
    $tersedia = htmlspecialchars($data["tersedia"]);
    $developer = htmlspecialchars($data["developer"]);
    $poster = htmlspecialchars($data["poster"]);
    // insert data
    $query = "UPDATE game SET 
                judul = '$judul', 
                genre = '$genre', 
                tersedia = '$tersedia', 
                developer = '$developer', 
                poster = '$poster' 
                WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); // meberikan nilai (+1) jika perintah berhasil dijaankan
};