<?php
$conn = mysqli_connect("localhost", "root", "", "online_bimbel", 3307);

if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
