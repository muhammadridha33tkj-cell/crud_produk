<?php
include 'koneksi.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM produk WHERE id=$id"));
if ($data && $data['foto'] && file_exists('uploads/' . $data['foto'])) unlink('uploads/' . $data['foto']);
mysqli_query($koneksi, "DELETE FROM produk WHERE id=$id");
header('Location: index.php');
exit;
?>