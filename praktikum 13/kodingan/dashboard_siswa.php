<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] != 'siswa') {
    header("Location: login.php");
    exit;
}

$page = $_GET['page'] ?? 'dashboard';
$nama = $_SESSION['nama'] ?? 'Siswa';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Siswa</title>
<link rel="stylesheet" href="style_siswa.css">
</head>
<body>

<div class="container">

<!-- SIDEBAR -->
<aside class="sidebar">
    <h2 class="logo">📘 Bimbel Online</h2>
    <ul class="menu">
        <li class="<?= $page=='dashboard'?'active':'' ?>">
            <a href="?page=dashboard">🏠 Dashboard</a>
        </li>
        <li class="<?= $page=='mapel'?'active':'' ?>">
            <a href="?page=mapel">📚 Mata Pelajaran</a>
        </li>
        <li class="<?= $page=='guru'?'active':'' ?>">
            <a href="?page=guru">👨‍🏫 Data Guru</a>
        </li>
        <li class="<?= $page=='pembayaran'?'active':'' ?>">
            <a href="?page=pembayaran">💳 Pembayaran</a>
        </li>
    </ul>
    <a href="logout.php" class="logout">🚪 Logout</a>
</aside>

<!-- MAIN -->
<main class="main">

<!-- TOPBAR -->
<div class="topbar">
    <h1>DASHBOARD SISWA</h1>
    <span>👤 <?= htmlspecialchars($nama); ?></span>
</div>

<?php if ($page == 'dashboard'): ?>

<!-- CARDS -->
<div class="cards">
    <div class="card blue">
        <h2>3</h2>
        <p>MATA PELAJARAN</p>
    </div>
    <div class="card green">
        <h2>2</h2>
        <p>GURU</p>
    </div>
    <div class="card orange">
        <h2>LUNAS</h2>
        <p>PEMBAYARAN</p>
    </div>
</div>

<!-- TABLE -->
<div class="content">
    <h3>📚 Mata Pelajaran Aktif</h3>
    <table>
        <tr>
            <th>Mata Pelajaran</th>
            <th>Hari</th>
            <th>Jam</th>
        </tr>
        <tr>
            <td>Matematika</td>
            <td>Senin</td>
            <td>16.00 - 18.00</td>
        </tr>
    </table>
</div>

<?php elseif ($page == 'mapel'): ?>

<div class="content">
    <h3>📚 Mata Pelajaran</h3>
    <table>
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Hari</th>
            <th>Jam</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Matematika</td>
            <td>Senin</td>
            <td>16.00 - 18.00</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Bahasa Inggris</td>
            <td>Rabu</td>
            <td>16.00 - 18.00</td>
        </tr>
    </table>
</div>

<?php elseif ($page == 'guru'): ?>

<div class="content">
    <h3>👨‍🏫 Data Guru</h3>
    <table>
        <tr>
            <th>Nama Guru</th>
            <th>Mata Pelajaran</th>
        </tr>
        <tr>
            <td>Pak Andi</td>
            <td>Matematika</td>
        </tr>
        <tr>
            <td>Bu Rina</td>
            <td>Bahasa Inggris</td>
        </tr>
    </table>
</div>

<?php elseif ($page == 'pembayaran'): ?>

<div class="content">
    <h3>💳 Pembayaran</h3>
    <table>
        <tr>
            <th>Paket</th>
            <th>Status</th>
            <th>Keterangan</th>
        </tr>
        <tr>
            <td>Reguler</td>
            <td>Lunas</td>
            <td>Desember 2025</td>
        </tr>
    </table>
</div>

<?php endif; ?>

</main>
</div>

</body>
</html>
