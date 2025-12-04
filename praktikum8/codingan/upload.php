<?php
include "koneksi.php";

$nama_file = $_FILES['file_foto']['name'];
$tmp = $_FILES['file_foto']['tmp_name'];

$folder = "uploads/" . $nama_file;

// Upload file ke folder
move_uploaded_file($tmp, $folder);

// Simpan ke database
mysqli_query($conn, "INSERT INTO foto (nama_foto, file_foto) VALUES ('$nama_file', '$nama_file')");

// Kembali ke halaman utama
header("Location: index.php");
?>
