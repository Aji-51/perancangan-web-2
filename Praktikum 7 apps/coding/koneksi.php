<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "foto";

// Gunakan 127.0.0.1 agar lebih stabil
$koneksi = mysqli_connect("127.0.0.1", $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
