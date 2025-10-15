<?php
include 'koneksi.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM produk WHERE id=$id"));
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Edit Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container py-4">
  <a href="index.php" class="btn btn-link">&larr; Kembali</a>
  <div class="card shadow-sm">
    <div class="card-body">
      <h4 class="card-title mb-3">Edit Produk</h4>
      <form action="proses_edit.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="mb-3">
          <label class="form-label">Nama Produk</label>
          <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($data['nama']) ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Harga (angka)</label>
          <input type="number" name="harga" class="form-control" value="<?= htmlspecialchars($data['harga']) ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea name="deskripsi" class="form-control" rows="3"><?= htmlspecialchars($data['deskripsi']) ?></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Foto saat ini</label><br>
          <img src="uploads/<?= htmlspecialchars($data['foto']) ?>" width="220" style="object-fit:cover;"><br><br>
          <label class="form-label">Ganti Foto (opsional)</label>
          <input type="file" name="foto" class="form-control" accept="image/*">
        </div>
        <button class="btn btn-primary">Update</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>