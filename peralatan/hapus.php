<?php
include "../koneksi.php";

if(!isset($_GET['id'])){
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];

$hapus = mysqli_query($conn, "DELETE FROM peralatan WHERE id_barang='$id'");

if($hapus){
    echo "<script>
            alert('Data peralatan berhasil dihapus!');
            window.location='../index.php';
          </script>";
}else{
    echo "<script>
            alert('Data peralatan gagal dihapus!');
            window.location='../index.php';
          </script>";
}
?>