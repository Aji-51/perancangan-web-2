<?php
include "koneksi.php";

// --- Pagination --- //
$limit = 2; // jumlah data per halaman
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// Ambil data halaman ini
$data = mysqli_query($conn, "SELECT * FROM foto ORDER BY id DESC LIMIT $start, $limit");
if (!$data) {
    die("Query Error: " . mysqli_error($conn));
}

// Hitung total data
$total_result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM foto");
$total_row = mysqli_fetch_assoc($total_result);
$total_data = $total_row['total'];

// Hitung total halaman
$total_page = ceil($total_data / $limit);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h2>UPLOAD FOTO</h2>

    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file_foto" required>
        <button type="submit">Upload</button>
    </form>

    <h3>Daftar Foto</h3>

    <table>
        <tr>
            <th>No</th>
            <th>Nama Foto</th>
            <th>Foto</th>
            <th>Tanggal Upload</th>
            <th>Aksi</th>
        </tr>

        <?php
        $no = $start + 1; // Nomor urut mengikuti halaman
        while ($row = mysqli_fetch_assoc($data)) {
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['nama_foto']; ?></td>
            <td><img src="uploads/<?= $row['file_foto']; ?>"></td>
            <td><?= $row['tanggal_upload']; ?></td>
            <td>
                <a class="btn-delete" href="delete.php?id=<?= $row['id']; ?>">Hapus</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <!-- PAGINATION -->
    <div class="pagination">
        <?php for ($i = 1; $i <= $total_page; $i++) { ?>
            <a href="index.php?page=<?= $i ?>" class="<?= ($i == $page) ? 'active' : '' ?>">
                <?= $i ?>
            </a>
        <?php } ?>
    </div>

</div>

</body>
</html>
