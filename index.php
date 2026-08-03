<?php
include "koneksi.php";

$queryKategori = mysqli_query($conn, "SELECT * FROM kategori ORDER BY id_kategori ASC");

$queryPeralatan = mysqli_query($conn, "SELECT peralatan.*, kategori.nama_kategori
FROM peralatan
INNER JOIN kategori
ON peralatan.id_kategori = kategori.id_kategori
ORDER BY id_barang ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventaris Peralatan Camping</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">

    <!-- ================= DATA KATEGORI ================= -->

    <div class="card shadow mb-4">
        <div class="card-header bg-success text-white">
            <h3>Data Kategori</h3>
        </div>

        <div class="card-body">

            <a href="kategori/tambah.php" class="btn btn-primary mb-3">
                + Tambah Kategori
            </a>

            <table class="table table-bordered table-hover">
                <thead class="table-success">
                    <tr>
                        <th width="10%">No</th>
                        <th>Nama Kategori</th>
                        <th width="20%">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $no = 1;

                if(mysqli_num_rows($queryKategori) > 0){

                    while($data = mysqli_fetch_assoc($queryKategori)){
                ?>

                    <tr>
                        <td><?= $no++; ?></td>

                        <td><?= $data['nama_kategori']; ?></td>

                        <td>

                            <a href="kategori/edit.php?id=<?= $data['id_kategori']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="kategori/hapus.php?id=<?= $data['id_kategori']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">
                                Hapus
                            </a>

                        </td>
                    </tr>

                <?php
                    }

                }else{
                ?>

                    <tr>
                        <td colspan="3" class="text-center">
                            Belum ada data kategori.
                        </td>
                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>
    </div>

    <!-- ================= DATA PERALATAN ================= -->

    <div class="card shadow">

        <div class="card-header bg-primary text-white">
            <h3>Data Peralatan</h3>
        </div>

        <div class="card-body">

            <a href="peralatan/tambah.php" class="btn btn-success mb-3">
                + Tambah Peralatan
            </a>

            <table class="table table-bordered table-hover">

                <thead class="table-primary">
                    <tr>
                        <th>No</th>
                        <th>Nama Peralatan</th>
                        <th>Kategori</th>
                        <th>Merk</th>
                        <th>Stok</th>
                        <th>Kondisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                $no = 1;

                if(mysqli_num_rows($queryPeralatan) > 0){

                    while($data = mysqli_fetch_assoc($queryPeralatan)){
                ?>

                    <tr>

                        <td><?= $no++; ?></td>

                        <td><?= $data['nama_peralatan']; ?></td>

                        <td><?= $data['nama_kategori']; ?></td>

                        <td><?= $data['merk']; ?></td>

                        <td><?= $data['stok']; ?></td>

                        <td><?= $data['kondisi']; ?></td>

                        <td><?= $data['status']; ?></td>

                        <td>

                            <a href="peralatan/edit.php?id=<?= $data['id_barang']; ?>" class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="peralatan/hapus.php?id=<?= $data['id_barang']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data?')">
                                Hapus
                            </a>

                        </td>

                    </tr>

                <?php
                    }

                }else{
                ?>

                    <tr>

                        <td colspan="8" class="text-center">
                            Belum ada data peralatan.
                        </td>

                    </tr>

                <?php } ?>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>