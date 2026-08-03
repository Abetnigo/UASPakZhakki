<?php
include "../koneksi.php";

if(isset($_POST['simpan'])){
    $nama = mysqli_real_escape_string($conn, $_POST['nama_kategori']);

    $query = mysqli_query($conn, "INSERT INTO kategori(nama_kategori) VALUES('$nama')");

    if($query){
        echo "<script>
                alert('Data kategori berhasil ditambahkan!');
                window.location='../index.php';
              </script>";
    }else{
        echo "<script>
                alert('Data kategori gagal ditambahkan!');
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-success text-white">
            <h3>Tambah Kategori</h3>
        </div>

        <div class="card-body">
            <form method="POST">
                <div class="mb-3">
                    <label class="form-label">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Masukkan nama kategori" required>
                </div>

                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                <a href="../index.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>