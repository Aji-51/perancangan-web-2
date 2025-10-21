<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo FUNGSI</title>
</head>
<body>

<?php
// Fungsi untuk menampilkan salam
function salam($nama) {
    return "Halo, $nama! Selamat belajar bahasa PHP.<br>";
}

// Fungsi untuk menghitung rata-rata nilai
function rataRataNilai($nilai1, $nilai2, $nilai3) {
    return ($nilai1 + $nilai2 + $nilai3) / 3;
}

// Memanggil fungsi
echo salam("Nur ahmaji");
$rata = rataRataNilai(80, 85, 85);
echo "Rata-rata nilai Anda adalah: " . $rata;
?>

</body>
</html>