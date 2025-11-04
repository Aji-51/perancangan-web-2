<?php
include 'koneksi.php';

// Ambil ID siswa dari URL
$id = $_GET['id'] ?? 0;

// Pastikan ID valid
if ($id == 0) {
    echo "<script>alert('ID siswa tidak ditemukan!');window.location='siswa.php';</script>";
    exit;
}

// Hapus data dari tabel mahasiswa
$hapus = mysqli_query($koneksi, "DELETE FROM siswa WHERE id_siswa='$id'");

// Cek hasil query
if ($hapus) {
    echo "<script>
        alert('Data siswa berhasil dihapus!');
        window.location=siswa.php';
    </script>";
} else {
    echo "<script>
        alert('Gagal menghapus data! Coba lagi.');
        window.location='siswa.php';
    </script>";
}
?>