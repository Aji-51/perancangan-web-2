<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "bimbel_online"; // pastikan nama database sesuai

// Membuat koneksi
$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Ambil data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_siswa = $_POST['nama_siswa'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $tanggal_daftar = $_POST['tanggal_daftar'];

    // Query simpan data
    $sql = "INSERT INTO siswa (nama_siswa, email, password, no_hp, alamat, tanggal_daftar) 
            VALUES ('$nama_siswa', '$email', '$password', '$no_hp', '$alamat', '$tanggal_daftar')";

    if ($conn->query($sql) === TRUE) {
        echo "✅ Data siswa berhasil disimpan.<br>";
        echo "<a href='form_siswa.html'>Tambah Data Lagi</a>";
    } else {
        echo "❌ Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>