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

// Ambil data dari input JSON, boleh ditambah validasi lagi kalau mau
$id_siswa          = $input['id_siswa'];
$nim               = $input['nim'] ?? null;
$nama              = $input['nama'] ?? null;
$kelamin           = $input['kelamin'] ?? null;
$alamat            = $input['alamat'] ?? null;
$no_hp             = $input['no_hp'] ?? null;
$nama_orang_tua    = $input['nama_orang_tua'] ?? null;
$pekerjaan_orang_tua = $input['pekerjaan_orang_tua'] ?? null;
$tanggal_daftar    = $input['tanggal_daftar'] ?? null;
$id_kelas          = $input['id_kelas'] ?? null;
$username          = $input['username'] ?? null;
$password          = $input['password'] ?? null;
$id_user           = $input['id_user'] ?? null;

// Siapkan query update, hanya kolom yang diisi saja yang akan diupdate
$fields = [];
$params = [];
$types = "";

// Fungsi bantu untuk tambah field & parameter
function addField(&$fields, &$params, &$types, $fieldName, $value, $typeChar) {
    if ($value !== null) {
        $fields[] = "$fieldName = ?";
        $params[] = $value;
        $types .= $typeChar;
    }
}

addField($fields, $params, $types, "nim", $nim, "s");
addField($fields, $params, $types, "nama", $nama, "s");
addField($fields, $params, $types, "kelamin", $kelamin, "s");
addField($fields, $params, $types, "alamat", $alamat, "s");
addField($fields, $params, $types, "no_hp", $no_hp, "s");
addField($fields, $params, $types, "nama_orang_tua", $nama_orang_tua, "s");
addField($fields, $params, $types, "pekerjaan_orang_tua", $pekerjaan_orang_tua, "s");
addField($fields, $params, $types, "tanggal_daftar", $tanggal_daftar, "s");
addField($fields, $params, $types, "id_kelas", $id_kelas, "i");
addField($fields, $params, $types, "username", $username, "s");
addField($fields, $params, $types, "password", $password, "s");
addField($fields, $params, $types, "id_user", $id_user, "i");

// Jika tidak ada field yang mau diupdate
if (count($fields) === 0) {
    echo json_encode([
        "status" => false,
        "message" => "Tidak ada data yang diupdate"
    ]);
    exit;
}

$params[] = $id_siswa;
$types .= "i";

$sql = "UPDATE siswa SET " . implode(", ", $fields) . " WHERE id_siswa = ?";

$stmt = $koneksi->prepare($sql);

if (!$stmt) {
    echo json_encode([
        "status" => false,
        "message" => "Gagal prepare statement: " . $koneksi->error
    ]);
    exit;
}

// Bind parameter dinamis (pakai call_user_func_array)
$bind_names[] = $types;
for ($i=0; $i<count($params); $i++) {
    $bind_name = 'bind' . $i;
    $$bind_name = $params[$i];
    $bind_names[] = &$$bind_name;
}

call_user_func_array([$stmt, 'bind_param'], $bind_names);

// Eksekusi
if ($stmt->execute()) {
    echo json_encode([
        "status" => true,
        "message" => "Data siswa berhasil diupdate"
    ]);
} else {
    echo json_encode([
        "status" => false,
        "message" => "Gagal update data: " . $stmt->error
    ]);
}

$stmt->close();
$koneksi->close();
