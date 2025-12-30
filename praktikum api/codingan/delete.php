<?php
header("Content-Type: application/json");
include "../config/database.php";

// Baca data JSON dari request body
$input = json_decode(file_get_contents("php://input"), true);

// Validasi id_siswa wajib ada
if (!isset($input['id_siswa'])) {
    echo json_encode([
        "status" => false,
        "message" => "Field 'id_siswa' wajib diisi"
    ]);
    exit;
}

$id_siswa = $input['id_siswa'];

// Prepare statement hapus data
$stmt = $koneksi->prepare("DELETE FROM siswa WHERE id_siswa = ?");

if (!$stmt) {
    echo json_encode([
        "status" => false,
        "message" => "Gagal prepare statement: " . $koneksi->error
    ]);
    exit;
}

$stmt->bind_param("i", $id_siswa);

if ($stmt->execute()) {
    echo json_encode([
        "status" => true,
        "message" => "Data siswa berhasil dihapus"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Gagal menghapus data: " . $stmt->error
    ]);
}

$stmt->close();
$koneksi->close();
