<?php
include "koneksi.php";

if (isset($_POST['register'])) {
    // Ambil data dari form
    $nama     = mysqli_real_escape_string($conn, $_POST['nama']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    // Hash password sebelum disimpan
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    // Sesuaikan role dengan database kamu (siswa) dan tambahkan status
    $role     = 'siswa'; 
    $status   = 'aktif';

    // Sesuaikan urutan kolom: nama, username, email, password, role, status
    $query = mysqli_query($conn, "
        INSERT INTO users (nama, username, email, password, role, status)
        VALUES ('$nama', '$username', '$email', '$password', '$role', '$status')
    ");

    if ($query) {
        // Jika berhasil, arahkan ke login
        header("Location: login.php?register=success");
    } else {
        // Jika error (misal duplicate entry), tampilkan pesan
        echo "Gagal daftar: " . mysqli_error($conn);
    }
}
?>