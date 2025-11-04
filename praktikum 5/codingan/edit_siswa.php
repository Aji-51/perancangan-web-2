<?php
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'] ?? 0;

// Ambil data siswa berdasarkan id
$query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id_siswa='$id'");
$data = mysqli_fetch_assoc($query);

// Jika data tidak ditemukan
if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

// Proses update data saat tombol submit ditekan
if (isset($_POST['update'])) {
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

    $update = mysqli_query($koneksi, "UPDATE siswa SET 
        nim='$nim',
        nama='$nama',
        kelamin='$kelamin',
        alamat='$alamat',
        no_hp='$no_hp',
        nama_orang_tua='$nama_orang_tua',
        pekerjaan_orang_tua='$pekerjaan_orang_tua',
        tanggal_daftar='$tanggal_daftar',
        id_kelas='$id_kelas',
        username='$username',
        password='$password'
        WHERE id_siswa='$id'");

    if ($update) {
        echo "<script>alert('Data berhasil diupdate!');window.location='siswa.php';</script>";
    } else {
        echo "Gagal update data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f7fb;
            padding: 20px;
        }
        h2 { color: #252729; }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 0 5px rgba(0,0,0,0.2);
        }
        input, select {
            width: 100%;
            padding: 8px;
            margin: 8px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #222425;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover { background-color: #2a2d30; }
        a {
            text-decoration: none;
            color: #27292b;
        }
    </style>
</head>
<body>

<h2>Edit Data Siswa</h2>

<form method="POST">
    <label>NIM</label>
    <input type="text" name="nim" value="<?= htmlspecialchars($data['nim']); ?>" required>

    <label>Nama</label>
    <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>

    <label>Kelamin</label>
    <select name="kelamin" required>
        <option value="">-- Pilih --</option>
        <option value="Laki-laki" <?= $data['kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
        <option value="Perempuan" <?= $data['kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
    </select>

    <label>Alamat</label>
    <input type="text" name="alamat" value="<?= htmlspecialchars($data['alamat']); ?>" required>

    <label>No HP</label>
    <input type="tel" name="no_hp" value="<?= htmlspecialchars($data['no_hp']); ?>" required>

    <label>Nama Orang Tua</label>
    <input type="text" name="nama_orang_tua" value="<?= htmlspecialchars($data['nama_orang_tua']); ?>" required>

    <label>Pekerjaan Orang Tua</label>
    <input type="text" name="pekerjaan_orang_tua" value="<?= htmlspecialchars($data['pekerjaan_orang_tua']); ?>" required>

    <label>Tanggal Daftar</label>
    <input type="date" name="tanggal_daftar" value="<?= htmlspecialchars($data['tanggal_daftar']); ?>" required>

    <label>Kelas</label>
    <select name="id_kelas" required>
        <option value="">-- Pilih Kelas --</option>
        <?php
        $kelas = mysqli_query($koneksi, "SELECT * FROM kelas");
        while ($p = mysqli_fetch_assoc($kelas)) {
            $selected = ($p['id_kelas'] == $data['id_kelas']) ? 'selected' : '';
            echo "<option value='{$p['id_kelas']}' $selected>{$p['nama_kelas']}</option>";
        }
        ?>
    </select>

    <label>Username</label>
    <input type="text" name="username" value="<?= htmlspecialchars($data['username']); ?>" required>

    <label>Password</label>
    <input type="text" name="password" value="<?= htmlspecialchars($data['password']); ?>" required>

    <button type="submit" name="update">Simpan Perubahan</button>
    <a href="siswa.php">← Kembali</a>
</form>

</body>
</html>
