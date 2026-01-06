<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'owner') {
    header("Location: login.php");
    exit;
}

include "koneksi.php";

// ===== DATA LAPORAN BIMBEL =====
$totalSiswa = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) total FROM siswa")
)['total'] ?? 0;

$totalGuru = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT COUNT(*) total FROM guru")
)['total'] ?? 0;

$totalPembayaran = mysqli_fetch_assoc(
    mysqli_query($conn,"SELECT SUM(jumlah) total FROM pembayaran")
)['total'] ?? 0;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Owner | Laporan Bimbel Online</title>
<link rel="stylesheet" href="style_owner.css">
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">
        <h2 class="logo">📘 Bimbel Online</h2>

        <ul class="menu">
            <li class="active">
                <a href="dashboard_owner.php">📊 Laporan</a>
            </li>
        </ul>

        <a href="logout.php" class="logout">🚪 Logout</a>
    </aside>

    <!-- MAIN -->
    <main class="main">

        <!-- TOPBAR -->
        <div class="topbar">
            <h1>DASHBOARD OWNER</h1>
            <span>👤 <?= $_SESSION['nama']; ?></span>
        </div>

        <!-- LAPORAN CARD -->
        <div class="cards">
            <div class="card blue">
                <h2><?= $totalSiswa ?></h2>
                <p>TOTAL SISWA</p>
            </div>

            <div class="card orange">
                <h2>Rp <?= number_format($totalPembayaran,0,',','.') ?></h2>
                <p>TOTAL PEMASUKAN</p>
            </div>
        </div>

        <!-- DETAIL LAPORAN -->
        <div class="report">
            <h3>📈 Ringkasan Laporan Bimbel</h3>

            <table>
                <tr>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                </tr>
                <tr>
                    <td>Total Siswa Terdaftar</td>
                    <td><?= $totalSiswa ?></td>
                </tr>
               
                <tr>
                    <td>Total Pemasukan</td>
                    <td><strong>Rp <?= number_format($totalPembayaran,0,',','.') ?></strong></td>
                </tr>
            </table>
        </div>

    </main>
</div>

</body>
</html>
