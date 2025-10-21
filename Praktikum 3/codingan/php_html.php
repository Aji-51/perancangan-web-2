<!DOCTYPE html>
<html lang="en">
<head>
    <title>Latihan PHP + HTML</title>
</head>
<body>

<h2>Program PHP Sederhana - Data Mahasiswa</h2>

<?php
// Menampilkan pesan pembuka
echo "<b>hallo</b><br>";
echo "contoh cara ppenggunaan sederhana php di htlm<br><br>";

// Data mahasiswa disimpan dalam variabel
$nama       = "Nur ahmaji";
$prodi      = "Teknik Informatika";
$alamat     = "kesuben, Kec. lebaksiu, Kab. Tegal";
$umur       = 19;
$kampus     = "Politeknik Purbaya";
$kelamin    ="laki-laki";
// Menampilkan biodata dengan gaya berbeda
echo "<u>===== BIODATA MAHASISWA =====</u><br>";
echo "Nama Lengkap   : <b>$nama</b><br>";
echo "Program Studi  : $prodi<br>";
echo "Alamat         : $alamat<br>";
echo "Asal Kampus    : $kampus<br>";
echo "jenis kelamin  : $kelamin<br>";
echo "Umur           : $umur tahun<br><br>";


// Menambahkan logika kecil untuk menilai usia
if ($umur < 18) {
    echo "Kamu masih muda dan penuh semangat belajar! <br>";
} else {
    echo "teruslah menuntut ilmu <br>";
}

// Menampilkan tanggal dan waktu saat ini
echo "<br>Data ini diakses pada: " . date("l, d F Y - H:i:s");
?>

</body>
</html>