<?php
session_start();

// proteksi login guru
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'guru') {
    header("Location: login.php");
    exit;
}

$page = $_GET['page'] ?? 'dashboard';

/* DATA CONTOH (nanti bisa dari database) */
$totalSiswa = 32;
$totalKelas = 3;
$totalMapel = 4;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Guru - Bimbel Online</title>
<link rel="stylesheet" href="style_guru.css">
</head>
<body>

<div class="wrapper">

<!-- SIDEBAR -->
<div class="sidebar">
    <h2>📘 Bimbel Online</h2>
    <ul class="menu">
        <li class="<?= $page=='dashboard'?'active':'' ?>">
            <a href="?page=dashboard">🏠 Dashboard</a>
        </li>
        <li class="<?= $page=='siswa'?'active':'' ?>">
            <a href="?page=siswa">🎓 Data Siswa</a>
        </li>
        <li class="<?= $page=='kelas'?'active':'' ?>">
            <a href="?page=kelas">📚 Kelas Aktif</a>
        </li>
        <li class="<?= $page=='mapel'?'active':'' ?>">
            <a href="?page=mapel">📖 Mata Pelajaran</a>
        </li>
    </ul>
    <a class="logout" href="logout.php">🚪 Logout</a>
</div>

<!-- MAIN -->
<div class="main">

<div class="topbar">
    <h1>DASHBOARD GURU</h1>
    <div>👤 <?= $_SESSION['nama']; ?></div>
</div>

<?php if ($page == 'dashboard'): ?>

<!-- CARD RINGKASAN -->
<div class="cards">
    <div class="card">
        <h2><?= $totalSiswa ?></h2>
        <p>Total Siswa</p>
    </div>
    <div class="card">
        <h2><?= $totalKelas ?></h2>
        <p>Kelas Aktif</p>
    </div>
    <div class="card">
        <h2><?= $totalMapel ?></h2>
        <p>Mata Pelajaran</p>
    </div>
</div>

<div class="content">
    <h3>📊 Ringkasan Pengajaran</h3>
    <p>Guru dapat mengelola siswa, kelas aktif, dan mata pelajaran yang diajarkan.</p>
</div>

<?php elseif ($page == 'siswa'): ?>

<div class="content">
    <h3>🎓 Data Siswa</h3>
    <table>
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Status</th>
        </tr>
        <tr>
            <td>Aji</td>
            <td>XI IPA</td>
            <td>Aktif</td>
        </tr>
        <tr>
            <td>Rina</td>
            <td>X IPS</td>
            <td>Aktif</td>
        </tr>
    </table>
</div>

<?php elseif ($page == 'kelas'): ?>

<div class="content">
    <h3>📚 Kelas Aktif</h3>
    <table>
        <tr>
            <th>Nama Kelas</th>
            <th>Mata Pelajaran</th>
            <th>Jumlah Siswa</th>
        </tr>
        <tr>
            <td>XI IPA</td>
            <td>Matematika</td>
            <td>16</td>
        </tr>
        <tr>
            <td>X IPS</td>
            <td>Bahasa Inggris</td>
            <td>16</td>
        </tr>
    </table>
</div>

<?php elseif ($page == 'mapel'): ?>

<div class="content">
    <h3>📖 Mata Pelajaran</h3>
    <table>
        <tr>
            <th>Mata Pelajaran</th>
            <th>Kelas</th>
        </tr>
        <tr>
            <td>Matematika</td>
            <td>XI IPA</td>
        </tr>
        <tr>
            <td>Bahasa Inggris</td>
            <td>X IPS</td>
        </tr>
    </table>
</div>

<?php endif; ?>

</div>
</div>

</body>
</html>
