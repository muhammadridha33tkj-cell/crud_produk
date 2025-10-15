<?php
include 'koneksi.php';
$q = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id DESC");
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Crud Produk - Modern UI</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand" href="#">CrudProduk</a>
    <div>
      <a href="tambah.php" class="btn btn-primary">+ Tambah Produk</a>
    </div>
  </div>
</nav>

<div class="container py-4">
  <div class="row g-3">
    <?php while($row = mysqli_fetch_assoc($q)) { ?>
      <div class="col-md-4">
        <div class="card h-100 shadow-sm">
          <img src="uploads/<?= htmlspecialchars($row['foto']) ?>" class="card-img-top" alt="product">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['nama']) ?></h5>
            <p class="card-text text-muted"><?= htmlspecialchars($row['deskripsi']) ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <strong class="text-primary">Rp <?= number_format($row['harga'],0,',','.') ?></strong>
              <div>
                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning">Edit</a>
                <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin hapus produk ini?')">Hapus</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <div class="footer text-center mt-5">
    Dibuat untuk tugas — tampil modern & bersih.
  </div>
</div>

</body>
</html>