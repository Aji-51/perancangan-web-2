<?php
session_start();

// PROTEKSI LOGIN ADMIN
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

$page = $_GET['page'] ?? 'dashboard';
$nama = $_SESSION['nama'] ?? 'Admin';

// DATA SEMENTARA (NANTI BISA DIGANTI QUERY DATABASE)
$totalSiswa = 45;
$totalGuru  = 6;
$totalKelas = 5;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin - Bimbel Online</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2 class="logo">📘 Bimbel Online</h2>

        <ul class="menu">
            <li><a href="dashboard_admin.php?page=dashboard">🏠 Dashboard</a></li>
            <li><a href="dashboard_admin.php?page=siswa">🎓 Data Siswa</a></li>
            <li><a href="dashboard_admin.php?page=guru">👨‍🏫 Data Guru</a></li>
            <li><a href="dashboard_admin.php?page=kelas">🏫 Kelas Aktif</a></li>
            <li><a href="dashboard_admin.php?page=jadwal">📅 Jadwal Pelajaran</a></li>
            <li><a href="dashboard_admin.php?page=absensi">📝 Absensi</a></li>
            <li><a href="dashboard_admin.php?page=pembayaran">💳 Pembayaran</a></li>
        </ul>

        <a href="logout.php" class="logout">🚪 Logout</a>
    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <h1>DASHBOARD ADMIN</h1>
            <span>👤 <?= htmlspecialchars($nama); ?></span>
        </div>

        <!-- CARD RINGKASAN -->
        <div class="cards">
            <div class="card blue">
                <h2><?= $totalSiswa ?></h2>
                <p>TOTAL SISWA</p>
            </div>
            <div class="card green">
                <h2><?= $totalGuru ?></h2>
                <p>TOTAL GURU</p>
            </div>
            <div class="card orange">
                <h2><?= $totalKelas ?></h2>
                <p>KELAS AKTIF</p>
            </div>
        </div>

        <!-- CONTENT -->
        <div class="content">

        <?php if ($page == 'dashboard'): ?>

            <h3>📊 Laporan Aktivitas Bimbel</h3>

            <div class="report-box">
                <p>Ringkasan data operasional bimbingan belajar.</p>
            </div>

            <h3 style="margin-top:25px;">🏫 Kelas Aktif</h3>
            <table>
                <tr>
                    <th>Nama Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                    <th>Jumlah Siswa</th>
                    <th>Status</th>
                </tr>
                <tr>
                    <td>Kelas 9A</td>
                    <td>Matematika</td>
                    <td>Pak Aji</td>
                    <td>15</td>
                    <td>Aktif</td>
                </tr>
                <tr>
                    <td>Kelas 8B</td>
                    <td>Bahasa Inggris</td>
                    <td>Bu Sinta</td>
                    <td>12</td>
                    <td>Aktif</td>
                </tr>
            </table>

        <?php elseif ($page == 'siswa'): ?>

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
            </table>

        <?php elseif ($page == 'guru'): ?>

            <h3>👨‍🏫 Data Guru</h3>
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Mata Pelajaran</th>
                </tr>
                <tr>
                    <td>Pak Aji</td>
                    <td>Matematika</td>
                </tr>
            </table>

        <?php elseif ($page == 'kelas'): ?>

            <h3>🏫 Data Kelas Aktif</h3>
            <table>
                <tr>
                    <th>Nama Kelas</th>
                    <th>Mata Pelajaran</th>
                    <th>Guru</th>
                    <th>Jumlah Siswa</th>
                </tr>
                <tr>
                    <td>9A</td>
                    <td>Matematika</td>
                    <td>Pak Aji</td>
                    <td>15</td>
                </tr>
                <tr>
                    <td>8B</td>
                    <td>Bahasa Inggris</td>
                    <td>Bu Sinta</td>
                    <td>12</td>
                </tr>
            </table>

        <?php elseif ($page == 'jadwal'): ?>

            <h3>📅 Jadwal Pelajaran</h3>
            <table>
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Kelas</th>
                    <th>Guru</th>
                </tr>
                <tr>
                    <td>Senin</td>
                    <td>16:00 - 18:00</td>
                    <td>9A</td>
                    <td>Pak Aji</td>
                </tr>
            </table>

        <?php elseif ($page == 'absensi'): ?>

            <h3>📝 Absensi</h3>
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Kehadiran</th>
                </tr>
                <tr>
                    <td>Aji</td>
                    <td>10-12-2025</td>
                    <td>Hadir</td>
                </tr>
            </table>

        <?php elseif ($page == 'pembayaran'): ?>

            <h3>💳 Pembayaran</h3>
            <table>
                <tr>
                    <th>Nama</th>
                    <th>Bulan</th>
                    <th>Jumlah</th>
                </tr>
                <tr>
                    <td>Aji</td>
                    <td>Desember</td>
                    <td>0</td>
                </tr>
            </table>

        <?php endif; ?>

        </div>
    </main>

</div>
</body>
</html>
