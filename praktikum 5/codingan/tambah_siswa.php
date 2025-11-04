<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah siswa</title>
    <style>
        body {font-family: Arial; background: #f6f9ff; padding: 20px;}
        form {background: white; padding: 20px; border-radius: 10px; width: 400px;}
        input, select, textarea {width: 100%; padding: 8px; margin: 5px 0;}
        input[type=submit] {background: #282b2eff; color: white; border: none; padding: 10px;}
        input[type=submit]:hover {background: #2c2e30ff;}
    </style>
</head>
<body>

<h2>Tambah siswa</h2>

<form method="post">
    NIM:
    <input type="text" name="nim" required>

    Nama:
    <input type="text" name="nama" required>

   Kelamin:
<select name="kelamin" required>
    <option value="">-- Pilih --</option>
    <option value="Laki-laki">Laki-laki</option>
    <option value="Perempuan">Perempuan</option>
</select>

    Alamat:
    <textarea name="alamat"></textarea>

    No HP:
    <input type="tel" name="no_hp" required>

    Nama Orang Tua:
    <input type="text" name="nama_orang_tua" required>

    Pekerjaan Orang Tua:
    <input type="text" name="pekerjaan_orang_tua" required>


    Tanggal Daftar:
    <input type="date" name="tanggal_daftar" required>

   kelas:
    <select name="id_kelas" required>
        <option value="">-- Pilih Kelas --</option>
        <?php
        $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
        while ($p = mysqli_fetch_array($kelas)) {
            echo "<option value='{$p['id_kelas']}'>{$p['nama_kelas']}</option>";
          }
          ?>
     </select>


    Username:
    <input type="text" name="username" required>

    Password:
    <input type="password" name="password" required>

    <input type="submit" name="simpan" value="Simpan Data">
</form>

<?php
if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $kelamin = $_POST['kelamin'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $nama_orang_tua = $_POST['nama_orang_tua'];
    $pekerjaan_orang_tua = $_POST['pekerjaan_orang_tua'];
    $tanggal_daftar = $_POST['tanggal_daftar'];
    $id_kelas = $_POST['id_kelas'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO siswa (nim, nama, kelamin, alamat, no_hp, nama_orang_tua, pekerjaan_orang_tua, tanggal_daftar, id_kelas, username, password)
              VALUES ('$nim','$nama','$kelamin','$alamat','$no_hp','$nama_orang_tua','$pekerjaan_orang_tua', '$tanggal_daftar', '$id_kelas', '$username','$password')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: siswa.php");
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<br>
<a href="siswa.php">← Kembali</a>

</body>
</html>
