<?php
include "../koneksi.php";

$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM kategori WHERE id_kategori='$id'");

if($hapus){
    echo "<script>
            alert('Data kategori berhasil dihapus!');
            window.location='../index.php';
          </script>";
}else{
    echo "<script>
            alert('Data kategori gagal dihapus!');
            window.location='../index.php';
          </script>";
}
?>