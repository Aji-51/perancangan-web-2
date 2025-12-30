<?php
header("Content-Type: application/json");
include "../config/database.php";

// Baca data JSON dari request body
$input = json_decode(file_get_contents("php://input"), true);

// Validasi data yang wajib ada (bisa ditambah sesuai kebutuhan)
$required_fields = ['nim', 'nama', 'kelamin', 'alamat', 'no_hp', 'nama_orang_tua', 'pekerjaan_orang_tua', 'tanggal_daftar', 'id_kelas', 'username', 'password', 'id_user'];

foreach ($required_fields as $field) {
    if (!isset($input[$field])) {
        echo json_encode([
            "status" => false,
            "message" => "Field '$field' wajib diisi"
        ]);
        exit;
    }
}

// Ambil data dari input JSON
$nim               = $input['nim'];
$nama              = $input['nama'];
$kelamin           = $input['kelamin']; // Harus 'Laki-laki' atau 'Perempuan'
$alamat            = $input['alamat'];
$no_hp             = $input['no_hp'];
$nama_orang_tua    = $input['nama_orang_tua'];
$pekerjaan_orang_tua = $input['pekerjaan_orang_tua'];
$tanggal_daftar    = $input['tanggal_daftar']; // Format: YYYY-MM-DD
$id_kelas          = $input['id_kelas'];
$username          = $input['username'];
$password          = $input['password'];
$id_user           = $input['id_user'];

// Prepare query insert dengan prepared statement untuk keamanan
$stmt = $koneksi->prepare("INSERT INTO siswa (nim, nama, kelamin, alamat, no_hp, nama_orang_tua, pekerjaan_orang_tua, tanggal_daftar, id_kelas, username, password, id_user) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

if (!$stmt) {
    echo json_encode([
        "status" => false,
        "message" => "Gagal prepare statement: " . $koneksi->error
    ]);
    exit;
}

// Bind parameter, tipe data:
// s = string, i = integer
$stmt->bind_param(
    "ssssssssisis",
    $nim,
    $nama,
    $kelamin,
    $alamat,
    $no_hp,
    $nama_orang_tua,
    $pekerjaan_orang_tua,
    $tanggal_daftar,
    $id_kelas,
    $username,
    $password,
    $id_user
);

// Eksekusi query
if ($stmt->execute()) {
    echo json_encode([
        "status" => true,
        "message" => "Data siswa berhasil ditambahkan"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Gagal menambahkan data: " . $stmt->error
    ]);
}

$stmt->close();
$koneksi->close();
