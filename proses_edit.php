<?php
include 'koneksi.php';
$id = isset($_POST['id']) ? (int)$_POST['id'] : 0;
$nama = isset($_POST['nama']) ? mysqli_real_escape_string($koneksi, $_POST['nama']) : '';
$harga = isset($_POST['harga']) ? (int)$_POST['harga'] : 0;
$deskripsi = isset($_POST['deskripsi']) ? mysqli_real_escape_string($koneksi, $_POST['deskripsi']) : '';

$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM produk WHERE id=$id"));
$foto = $data['foto'];

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $target_dir = 'uploads/';
    $file_name = time() . '-' . basename($_FILES['foto']['name']);
    $target_file = $target_dir . $file_name;
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        if ($foto && file_exists($target_dir . $foto)) unlink($target_dir . $foto);
        $foto = $file_name;
    }
}

$sql = "UPDATE produk SET nama='$nama', harga=$harga, deskripsi='$deskripsi', foto='$foto' WHERE id=$id";
mysqli_query($koneksi, $sql);
header('Location: index.php');
exit;
?>