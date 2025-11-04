<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data siswa</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #f3f6fb;}
        h2 {color: #27292cff;}
        table {border-collapse: collapse; width: 100%; background: white;}
        th, td {border: 1px solid #ddd; padding: 8px; text-align: center;}
        th {background-color: #1f2022ff; color: white;}
        a {text-decoration: none; color: #32363aff;}
        a:hover {text-decoration: underline;}
        .btn {padding: 6px 10px; background: #26282bff; color: white; border-radius: 5px;}
        .btn:hover {background: #2f3336ff;}
    </style>
</head>
<body>

<a href="index.php">kembali</a>
<h2>Data siswa</h2>

<a href="tambah_siswa.php" class="btn">+ Tambah siswa</a>
<br><br>

<table>
    <tr>
        <th>No</th>
        <th>NIM</th>
        <th>Nama</th>
        <th>Kelamin</th>
        <th>Alamat</th>
        <th>No hp</th>
        <th>Nama orang tua</th>
        <th>Pekerjaan orang tua</th>
        <th>Tanggal daftar</th>
        <th>Kelas</th>
        <th>Username</th>
        <th>Password</th>
        <th>Aksi</th>
    </tr>

    <?php
    $no = 1;
    $query = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY id_siswa ASC");
    while ($data = mysqli_fetch_array($query)) {
        echo "<tr>
            <td>$no</td>
            <td>$data[nim]</td>
            <td>$data[nama]</td>
            <td>$data[kelamin]</td>;
            <td>$data[alamat]</td>
            <td>$data[no_hp]</td>
            <td>$data[nama_orang_tua]</td>
            <td>$data[pekerjaan_orang_tua]</td>
            <td>$data[tanggal_daftar]</td>
            <td>$data[id_kelas]</td>
            <td>$data[username]</td>
            <td>$data[password]</td>
            <td>
                <a href='edit_siswa.php?id=$data[id_siswa]'>Edit</a> |
                <a href='hapus_siswa.php?id=$data[id_siswa]' onclick='return confirm(\"Yakin hapus?\")'>Hapus</a>
            </td>
        </tr>";
        $no++;
    }
    ?>
</table>
</body>
</html>
