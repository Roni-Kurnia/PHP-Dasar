<?php
$conn = mysqli_connect("localhost", "root", "@Roni123", "phpdasar");

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

    // upload poster
    $poster = upload();
    if(!$poster){
        return false;
    }

    // insert data
    $query = "INSERT INTO game VALUES ('', '$judul', '$genre', '$tersedia', '$developer', '$poster')";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); // meberikan nilai (+1) jika perintah berhasil dijaankan
};

function upload() {
    $namaFile = $_FILES['poster']['name'];
    $ukuranFile = $_FILES['poster']['size'];
    $error = $_FILES['poster']['error'];
    $tmpName = $_FILES['poster']['tmp_name'];

    // cek apakah ada gambar yang diupload
    if ($error === 4) {
        echo "<script>alert('pilih gambar terlebih dahulu')</script>";
        return false;
    }

    // cek apakah yang diupload adlah gambar 
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $settingGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($settingGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>alert('yang anda upload bukan gambar')</script>";
        return false;
    }

    // cek jika ukuran file terlalu besar(ukuran dalam byte)
    if ($ukuranFile > 1000000000) {
        echo "<script>alert('ukuran gambar terlalu besar')</script>";
        return false;
    }

    // lolos pengecekan gambar dan sip upload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'asset/'. $namaFileBaru);

    return $namaFileBaru; // menghasilakan nilai true untuk function tambah 
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
    $oldPoster = htmlspecialchars($data["oldPoster"]);

    // cek apakh user pilih gambar baru atau tidak
    if($_FILES['poster']['error'] === 4 ) {
        $poster = $oldPoster;
    } else {
        $poster = upload();
    }

    // insert data
    $query = "UPDATE game SET judul = '$judul', genre = '$genre', tersedia = '$tersedia', developer = '$developer', poster = '$poster' WHERE id = $id";
    mysqli_query($conn, $query);
    return mysqli_affected_rows($conn); // meberikan nilai (+1) jika perintah berhasil dijaankan
};

function cari ($keyword) {
    $query = "SELECT * FROM game WHERE judul LIKE '%$keyword%' OR genre LIKE '%$keyword%' OR tersedia LIKE '%$keyword%' OR developer LIKE '%$keyword%'";
    return query($query);
}

function registrasi ($data) {
    global $conn;

    // memaksa input untuk menggunakan huruf kecil(strtolower) dan menghilangkan/membersihkan simbol(stripslashes)
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn,  $data["password"]);
    $password2 = mysqli_real_escape_string($conn,$data["password2"]);

    if(empty($username && $password && $password2)){
        echo "<script> alert(' ada kolom yang belum diisi');</script>";
        return false;       
    }

    // cek username sudah ada belum
    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    
    if (mysqli_fetch_assoc($result)) {
        echo "<script> alert('username telah terdaftar');</script>";
        return false;       
    }

    // cek konfirmasi password
    if($password !== $password2 ) {
        echo "<script> alert('password tidak sesuai');</script>";
        return false;
    }
    
    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    $query = "INSERT INTO users VALUES('', '$username', '$password')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}