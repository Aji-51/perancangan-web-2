<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register-Bimbel Online</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: "Segoe UI", Tahoma, sans-serif;
        }

        body {
            margin: 0;
            height: 100vh;
            background: #f2f4f8;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 750px;
            height: 430px;
            background: #fff;
            display: flex;
            border-radius: 8px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            overflow: hidden;
            position: relative;
        }

        /* Bagian kiri */
        .left {
            width: 45%;
            background: linear-gradient(135deg, #fff, #fff);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .left img {
            width: 65%;
        }

        /* Bagian kanan */
        .right {
            width: 55%;
            padding: 40px;
        }

        .title {
            text-align: center;
            color: red;
            font-weight: bold;
            margin-bottom: 25px;
        }

        h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        form input:focus {
            outline: none;
            border-color: 
        }

        form button {
            width: 100%;
            padding: 10px;
            background: #0a45e8ff;
            border: none;
            color: #fff;
            border-radius: 4px;
            font-size: 15px;
            cursor: pointer;
        }

        form button:hover {
            background: #383588ff;
        }

        .login-link {
            margin-top: 15px;
            text-align: center;
            font-size: 13px;
        }

        .login-link a {
            color: #0652ecff
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- KIRI -->
    <div class="left">
        <img src="bg-bimbel.png" alt="bimbel online">
    </div>

    <!-- KANAN -->
    <div class="right">
        <div class="title">Bimbel online</div>
        <h3>Register </h3>

        <!-- FORM TIDAK DIUBAH -->
        <form method="POST" action="register_process.php">
            <input type="text" name="nama" placeholder="Nama Lengkap" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="register">Daftar</button>
        </form>

        <div class="login-link">
            Sudah punya akun? <a href="login.php">Login</a>
        </div>
    </div>

</div>

</body>
</html>



