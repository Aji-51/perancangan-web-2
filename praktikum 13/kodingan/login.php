<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | Bimbel</title>

    <style>
        /* RESET */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* BODY */
        body {
            background: #f2f2f2;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* CONTAINER */
        .container {
            width: 650px;
            background: #ffffff;
            display: flex;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.15);
            overflow: hidden;
        }

        /* LEFT */
        .left {
            width: 45%;
            padding: 25px 20px;
            text-align: center;
        }

        .left .title {
            color: #0d6efd;
            font-style: italic;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .left p {
            display: none;
        }

        /* Logo */
        .left::before {
            content: "";
            display: block;
            width: 120px;
            height: 120px;
            margin: 0 auto 10px;
            background: url("bg-bimbel.png") no-repeat center;
            background-size: contain;
        }

        /* RIGHT */
        .right {
            width: 55%;
            padding: 25px;
        }

        .header {
            display: none;
        }

        /* FORM */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 13px;
            margin-bottom: 4px;
        }

        input {
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 12px;
            font-size: 13px;
        }

        input:focus {
            outline: none;
            border-color: #0d6efd;
        }

        /* BUTTON */
        .btn {
            background: #0d6efd;
            color: #fff;
            border: none;
            padding: 8px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn:hover {
            background: #0b5ed7;
        }

        /* REGISTER */
        .register-link {
            font-size: 12px;
            margin-top: 10px;
            text-align: center;
        }

        .register-link a {
            color: #0d6efd;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        /* ERROR */
        .error {
            background: #ffd6d6;
            color: #b30000;
            padding: 8px;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 12px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">

    <!-- KIRI -->
    <div class="left">
        <div class="title">Bimbel Cerdas</div>
        <p>Silakan login untuk melanjutkan</p>
    </div>

    <!-- KANAN -->
    <div class="right">

        <?php if (isset($_GET['error'])): ?>
            <div class="error">Email atau password salah</div>
        <?php endif; ?>

        <form method="POST" action="login_process.php">
            <label>Email</label>
            <input type="email" name="email" placeholder="Masukkan email" required>

            <label>Password</label>
            <input type="password" name="password" placeholder="Masukkan password" required>

            <button type="submit" name="login" class="btn">
                Login
            </button>
        </form>

        <div class="register-link">
            Belum punya akun? <a href="register.php">Daftar</a>
        </div>
    </div>

</div>

</body>
</html>
