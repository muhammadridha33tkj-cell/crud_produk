<?php
include 'koneksi.php';

$nama = isset($_POST['nama']) ? mysqli_real_escape_string($koneksi, $_POST['nama']) : '';
$harga = isset($_POST['harga']) ? (int)$_POST['harga'] : 0;
$deskripsi = isset($_POST['deskripsi']) ? mysqli_real_escape_string($koneksi, $_POST['deskripsi']) : '';

$target_dir = "uploads/";
if (!is_dir($target_dir)) mkdir($target_dir, 0755, true);

if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $file_name = time() . "-" . basename($_FILES['foto']['name']);
    $target_file = $target_dir . $file_name;
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        $sql = "INSERT INTO produk (nama, harga, deskripsi, foto) VALUES ('$nama', $harga, '$deskripsi', '$file_name')";
        mysqli_query($koneksi, $sql);
        header('Location: index.php');
        exit;
    } else {
        echo 'Gagal mengunggah foto.';
    }
} else {
    echo 'Tidak ada foto yang valid.';
}
?>