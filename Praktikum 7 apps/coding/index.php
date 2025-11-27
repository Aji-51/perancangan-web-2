<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Galeri Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">

    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white text-center">
            <h3>Galeri Foto</h3>
        </div>

        <div class="card-body">
            <a href="input_foto.php" class="btn btn-primary mb-3">Upload Foto Baru</a>

            <div class="row">
                <?php
                $data = mysqli_query($koneksi, "SELECT * FROM foto ORDER BY id DESC");
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm">
                            <img src="uploads/<?php echo $d['nama_file']; ?>"
                                 class="card-img-top"
                                 style="height:200px; object-fit:cover;">

                            <div class="card-body text-center">
                                <a href="delete.php?id=<?php echo $d['id']; ?>"
                                   class="btn btn-danger btn-sm w-100"
                                   onclick="return confirm('Yakin ingin menghapus foto ini?')">
                                   Hapus Foto
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</div>

</body>
</html>
