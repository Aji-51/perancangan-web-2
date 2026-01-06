<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Bimbel Online | Selamat Datang</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            min-height: 100vh;
            background: linear-gradient(to right, #2c7be5, #4dabf7);
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card {
            background: #fff;
            width: 400px;
            padding: 40px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        .card h1 {
            color: #2c7be5;
            margin-bottom: 10px;
        }

        .card p {
            margin-bottom: 30px;
            color: #555;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-login {
            background: #2c7be5;
            color: #fff;
        }

        .btn-login:hover {
            background: #1a68d1;
        }

        .btn-register {
            background: #ffd43b;
            color: #000;
        }

        .btn-register:hover {
            background: #f1c40f;
        }

        footer {
            margin-top: 25px;
            font-size: 13px;
            color: #888;
        }
    </style>
</head>
<body>

    <div class="card">
        <h1>BIMBEL ONLINE</h1>
        <p>Silakan pilih untuk melanjutkan</p>

        <a href="login.php" class="btn btn-login">Login</a>
        <a href="register.php" class="btn btn-register">Register</a>

        <footer>
            &copy; <?php echo date('Y'); ?> Bimbel Online
        </footer>
    </div>

</body>
</html>
