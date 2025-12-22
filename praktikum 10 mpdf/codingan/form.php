<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Mail Alert</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Form Mail Alert</h2>

<form action="proses.php" method="POST" autocomplete="off">
    
    <input type="text" name="nama" placeholder="Nama Lengkap" required>

    <input type="text" name="nim" placeholder="NIM" required>

    <input type="text" name="kelas" placeholder="Kelas">

    <input type="text" name="prodi" placeholder="Program Studi">

    <input type="text" name="universitas" placeholder="Universitas">

    <input type="email" name="email" placeholder="Email Tujuan" required>

    <textarea name="pesan" placeholder="Pesan" rows="4" required></textarea>

    <button type="submit" id="btnKirim">Kirim</button>
</form>

<script>
    const form = document.querySelector("form");
    const btn  = document.getElementById("btnKirim");

    form.addEventListener("submit", function () {
        btn.innerText = "Mengirim...";
        btn.disabled = true;
    });
</script>

</body>
</html>
