<?php

$host="localhost";
$user="root";
$pass="";
$db="barang";

$conn=mysqli_connect($host,$user,$pass,$db);

if(!$conn){
    die("Koneksi Gagal");
}

?>