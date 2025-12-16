<?php
$koneksi = mysqli_connect("localhost", "root", "", "mail_alert");

if (!$koneksi) {
    die("Koneksi database gagal!");
}
?>