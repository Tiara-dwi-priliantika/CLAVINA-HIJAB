<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$db   = "clavina_db"; 
$port = 3306;

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
