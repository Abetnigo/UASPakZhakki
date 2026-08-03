<?php
include "../koneksi.php";

$queryKategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nama_kategori ASC");

if(isset($_POST['simpan'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama_peralatan']);
    $kategori = $_POST['id_kategori'];
    $merk = mysqli_real_escape_string($conn, $_POST['merk']);
    $stok = $_POST['stok'];
    $kondisi = $_POST['kondisi'];
    $status = $_POST['status'];

    $simpan = mysqli_query($conn, "INSERT INTO peralatan (nama_peralatan,id_kategori,merk,stok,kondisi,status)
    VALUES ('$nama','$kategori','$merk','$stok','$kondisi','$status')");

    if($simpan){
        echo "<script>
                alert('Data peralatan berhasil ditambahkan!');
                window.location='../index.php';
              </script>";
    }else{
        echo "<script>
                alert('Data peralatan gagal ditambahkan!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Peralatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-primary text-white">
<h3>Tambah Peralatan</h3>
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label class="form-label">Nama Peralatan</label>
<input type="text" name="nama_peralatan" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Kategori</label>
<select name="id_kategori" class="form-select" required>

<option value="">-- Pilih Kategori --</option>

<?php
while($kategori = mysqli_fetch_assoc($queryKategori)){
?>

<option value="<?= $kategori['id_kategori']; ?>">
    <?= $kategori['nama_kategori']; ?>
</option>

<?php } ?>

</select>
</div>

<div class="mb-3">
<label class="form-label">Merk</label>
<input type="text" name="merk" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Stok</label>
<input type="number" name="stok" class="form-control" required>
</div>

<div class="mb-3">
<label class="form-label">Kondisi</label>
<select name="kondisi" class="form-select" required>
<option value="Baik">Baik</option>
<option value="Rusak">Rusak</option>
</select>
</div>

<div class="mb-3">
<label class="form-label">Status</label>
<select name="status" class="form-select" required>
<option value="Tersedia">Tersedia</option>
<option value="Dipinjam">Dipinjam</option>
</select>
</div>

<button type="submit" name="simpan" class="btn btn-success">
Simpan
</button>

<a href="../index.php" class="btn btn-secondary">
Kembali
</a>

</form>
</div>
</div>
</div>
</body>
</html>