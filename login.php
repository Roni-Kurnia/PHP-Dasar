<?php 
require 'functions.php';

if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    
    $result = mysqli_query($conn,"SELECT * FROM users WHERE username = '$username'");

    // menegecek pengembalian nilai baris
    if (mysqli_num_rows($result) === 1 ) {
        // cek password 
        $row = mysqli_fetch_assoc($result);
        // decode password(membandingkan string)
        if(password_verify($password, $row["password"])) {
            // redirec ke index
            header("Location: index.php");
            exit;
        }
    }

    $error = true;
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
    <h1>selamat datang</h1>
    <?php if(isset($error)): ?>
        <p style="color: red; font-style: italic;">username atau password salah</p>
    <?php endif ?>
    <form action="" method="post">
        <ul>
            <li>
                <label name="username";>username :</label>
                <input type="text"; name="username"; id="username";>
            </li>
            <li>
                <label name="password";>password :</label>
                <input type="password"; name="password"; id="password";>
            </li>
            <li><button type="submit" name="login">login</button></li>
        </ul>
    </form>
</body>
</html>