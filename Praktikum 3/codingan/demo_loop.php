<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Demo LOOPING</title>
</head>
<body>


<?php
// ===========================================
// WHILE
// ===========================================
echo "<h3>1. WHILE</h3>";

$angka = 1; // Inisialisasi variabel
while ($angka <= 5) { // Kondisi selama $angka ≤ 5
    echo "Putaran ke-$angka sedang berjalan<br>";
    $angka++; // Increment
}

// ===========================================
// DO-WHILE
// ===========================================
echo "<h3>2. DO-WHILE</h3>";

$x = 1;
do {
    echo "Nilai variabel x saat ini: $x<br>";
    $x++;
} while ($x <= 5); // Kondisi dicek setelah blok dijalankan minimal 1 kali

// ===========================================
// FOR
// ===========================================
echo "<h3>3. FOR</h3>";

for ($i = 1; $i <= 5; $i++) {
    echo "Langkah iterasi ke-$i berhasil<br>";
}

// ===========================================
// FOREACH
// ===========================================
echo "<h3>4. FOREACH</h3>";

// Contoh array data pelanggan kedai
$pelanggan = [
    "Nama" => "Nur ahmaji",
    "Pesanan" => "bakso urat",
    "Jumlah" => 3,
    "Harga Satuan" => "10000",
    "Total Bayar" => 3 * 10000
];

// Menampilkan semua isi array menggunakan foreach
foreach ($pelanggan as $key => $value) {
    echo "$key : $value<br>";
}

?>

</body>
</html>