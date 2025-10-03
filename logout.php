<?php 
session_start();
$_SESSION = [];
session_unset();
session_destroy();

setcookie('id', '', time() - 3200);
setcookie('key', '', time() - 3200);

header("Location: login.php");
exit;