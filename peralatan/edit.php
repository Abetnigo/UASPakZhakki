<?php
include "../koneksi.php";

if(!isset($_GET['id'])){
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];

$query = mysqli_query($conn, "SELECT * FROM peralatan WHERE id_barang='$id'");
$data = mysqli_fetch_assoc($query);

$queryKategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY nama_kategori ASC");

if(isset($_POST['update'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama_peralatan']);
    $kategori = $_POST['id_kategori'];
    $merk = mysqli_real_escape_string($conn, $_POST['merk']);
    $stok = $_POST['stok'];
    $kondisi = $_POST['kondisi'];
    $status = $_POST['status'];

    $update = mysqli_query($conn, "UPDATE peralatan SET
        nama_peralatan='$nama',
        id_kategori='$kategori',
        merk='$merk',
        stok='$stok',
        kondisi='$kondisi',
        status='$status'
        WHERE id_barang='$id'
    ");

    if($update){
        echo "<script>
                alert('Data peralatan berhasil diubah!');
                window.location='../index.php';
              </script>";
    }else{
        echo "<script>
                alert('Data peralatan gagal diubah!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Peralatan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

<div class="card shadow">

<div class="card-header bg-warning">
<h3>Edit Peralatan</h3>
</div>

<div class="card-body">

<form method="POST">

<div class="mb-3">
<label class="form-label">Nama Peralatan</label>
<input type="text" name="nama_peralatan" class="form-control" value="<?= $data['nama_peralatan']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Kategori</label>

<select name="id_kategori" class="form-select" required>

<?php while($kategori = mysqli_fetch_assoc($queryKategori)){ ?>

<option value="<?= $kategori['id_kategori']; ?>"
<?= ($kategori['id_kategori'] == $data['id_kategori']) ? 'selected' : ''; ?>>
<?= $kategori['nama_kategori']; ?>
</option>

<?php } ?>

</select>

</div>

<div class="mb-3">
<label class="form-label">Merk</label>
<input type="text" name="merk" class="form-control" value="<?= $data['merk']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Stok</label>
<input type="number" name="stok" class="form-control" value="<?= $data['stok']; ?>" required>
</div>

<div class="mb-3">
<label class="form-label">Kondisi</label>

<select name="kondisi" class="form-select">

<option value="Baik" <?= ($data['kondisi']=="Baik") ? "selected" : ""; ?>>
Baik
</option>

<option value="Rusak" <?= ($data['kondisi']=="Rusak") ? "selected" : ""; ?>>
Rusak
</option>

</select>

</div>

<div class="mb-3">
<label class="form-label">Status</label>

<select name="status" class="form-select">

<option value="Tersedia" <?= ($data['status']=="Tersedia") ? "selected" : ""; ?>>
Tersedia
</option>

<option value="Dipinjam" <?= ($data['status']=="Dipinjam") ? "selected" : ""; ?>>
Dipinjam
</option>

</select>

</div>

<button type="submit" name="update" class="btn btn-warning">
Update
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