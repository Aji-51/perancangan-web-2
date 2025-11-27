<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white text-center">
            <h3>Upload Foto</h3>
        </div>

        <div class="card-body">
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <label class="form-label">Pilih Foto</label>
                <input type="file" name="foto" class="form-control" required>

                <button type="submit" class="btn btn-success w-100 mt-3">
                    Upload Foto
                </button>
            </form>

            <a href="index.php" class="btn btn-secondary w-100 mt-3">Lihat Foto</a>
        </div>
    </div>
</div>

</body>
</html>
