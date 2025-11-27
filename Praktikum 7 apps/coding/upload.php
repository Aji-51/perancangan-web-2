<?php
include 'koneksi.php';

// Pastikan folder uploads ada
$folder = "uploads/";
if (!is_dir($folder)) {
    mkdir($folder, 0777, true);
}

$nama_file = $_FILES['foto']['name'];
$tmp       = $_FILES['foto']['tmp_name'];

$tujuan = $folder . basename($nama_file);

// Proses upload file
if (move_uploaded_file($tmp, $tujuan)) {

    // Simpan nama file ke database
    mysqli_query($koneksi, "INSERT INTO foto (nama_file) VALUES ('$nama_file')");

    header("Location: index.php");
    exit;
} else {
    echo "<h3>Upload gagal! Pastikan folder <b>uploads</b> sudah ada.</h3>";
}
?>
