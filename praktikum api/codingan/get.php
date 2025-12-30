<?php
include "../config/database.php";

$query = $koneksi->query("SELECT * FROM siswa");

$data = [];
while ($row = $query->fetch_assoc()) {
    $data[] = $row;
}

echo json_encode([
    "status" => true,
    "data" => $data
]);
