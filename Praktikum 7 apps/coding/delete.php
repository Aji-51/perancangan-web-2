<?php
include 'koneksi.php';

$id = $_GET['id'];

// Ambil nama file dari database
$data = mysqli_query($koneksi, "SELECT * FROM foto WHERE id = $id");
$file = mysqli_fetch_assoc($data);

$path = "uploads/" . $file['nama_file'];

// Hapus file di folder
if (file_exists($path)) {
    unlink($path);
}

// Hapus dari database
mysqli_query($koneksi, "DELETE FROM foto WHERE id = $id");

header("Location: index.php");
exit;
?>
