<?php
include "koneksi.php";

$id = $_GET['id'];

// Ambil data foto sebelum dihapus
$data = mysqli_query($conn, "SELECT file_foto FROM foto WHERE id=$id");
$row = mysqli_fetch_array($data);

$file = "uploads/" . $row['file_foto'];

// Hapus file dari folder
if (file_exists($file)) {
    unlink($file);
}

// Hapus dari database
mysqli_query($conn, "DELETE FROM foto WHERE id=$id");

header("Location: index.php");
?>
