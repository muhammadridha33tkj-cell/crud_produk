<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Tambah Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="container py-4">
  <a href="index.php" class="btn btn-link">&larr; Kembali</a>
  <div class="card shadow-sm">
    <div class="card-body">
      <h4 class="card-title mb-3">Tambah Produk</h4>
      <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
          <label class="form-label">Nama Produk</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Harga (angka)</label>
          <input type="number" name="harga" class="form-control" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Deskripsi</label>
          <textarea name="deskripsi" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label class="form-label">Foto Produk</label>
          <input type="file" name="foto" class="form-control" accept="image/*" required>
        </div>
        <button class="btn btn-success">Simpan</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>