<?php
include "../koneksi.php";

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
$data = mysqli_fetch_assoc($query);

if(isset($_POST['update'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama_kategori']);

    $update = mysqli_query($conn, "UPDATE kategori SET nama_kategori='$nama' WHERE id_kategori='$id'");

    if($update){
        echo "<script>
                alert('Data kategori berhasil diubah!');
                window.location='../index.php';
              </script>";
    }else{
        echo "<script>
                alert('Data kategori gagal diubah!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning">
            <h3>Edit Kategori</h3>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" value="<?= $data['nama_kategori']; ?>" required>
                </div>

                <button type="submit" name="update" class="btn btn-warning">Update</button>
                <a href="../index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>