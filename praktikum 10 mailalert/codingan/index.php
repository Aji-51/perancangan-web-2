<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mail Alert Mahasiswa</title>

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f6f8;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            width: 400px;
            margin: 30px auto;
            background: #ffffff;
            padding: 20px 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 8px 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        textarea {
            height: 80px;
            resize: none;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            border: none;
            color: white;
            font-size: 15px;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

<h2>Form Alert Mahasiswa</h2>

<form method="post" action="proses.php">
    Nama <br>
    <input type="text" name="nama" required><br><br>

    NIM <br>
    <input type="text" name="nim" required><br><br>

    Kelas <br>
    <input type="text" name="kelas" required><br><br>

    Prodi <br>
    <input type="text" name="prodi" required><br><br>

    Universitas <br>
    <input type="text" name="universitas" required><br><br>

    Email Tujuan <br>
    <input type="email" name="email" required><br><br>

    Pesan <br>
    <textarea name="pesan" required></textarea><br><br>

    <button type="submit">Kirim Alert</button>
</form>

</body>
</html>
