<?php
$host = "localhost";
$user = "root";
$pass = "aliridho1";
$db   = "crud_produk_db";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
