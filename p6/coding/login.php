<?php
session_start();
include 'koneksi.php';

// Proses login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $role = $_POST['role'];
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);

    // Tentukan tabel & halaman tujuan sesuai role
    $roleConfig = [
        'siswa' => ['table' => 'siswa', 'id' => 'id_siswa', 'redirect' => 'index.php'],
        'guru'  => ['table' => 'guru', 'id' => 'id_guru', 'redirect' => 'guru_index.php'],
        'admin' => ['table' => 'admin', 'id' => 'id_admin', 'redirect' => 'admin_index.php'],
        'owner' => ['table' => 'owner', 'id' => 'id_owner', 'redirect' => 'owner_index.php']
    ];

    if (!isset($roleConfig[$role])) {
        $error = "Peran tidak valid!";
    } else {

        $table = $roleConfig[$role]['table'];
        $idColumn = $roleConfig[$role]['id'];
        $redirect = $roleConfig[$role]['redirect'];

        // Query cari user
        $query = mysqli_query($koneksi, "SELECT * FROM $table WHERE username='$username' AND password='$password' LIMIT 1");

        if ($query && mysqli_num_rows($query) === 1) {

            $user = mysqli_fetch_assoc($query);

            // Simpan session
            $_SESSION['id'] = $user[$idColumn];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nama'] = $user['nama'];
            $_SESSION['role'] = $role;

            header("Location: $redirect");
            exit;

        } else {
            $error = "Username atau password salah!";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Bimbel Online</title>
  <style>
    /* ===== Tema Modern & Serasi dengan Index ===== */
    :root {
      --primary: #222425ff;
      --secondary: #292c2cff;
      --text: #242527ff;
      --white: #fff;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: url('bg-bimbel.png') no-repeat center center/cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: var(--text);
      position: relative;
    }

    body::before {
      content: "";
      position: absolute;
      inset: 0;
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(6px);
      z-index: -1;
    }

    .login-box {
      background: rgba(255, 255, 255, 0.9);
      padding: 35px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0,0,0,0.2);
      width: 380px;
      text-align: center;
      animation: fadeIn 1s ease;
    }

    h2 {
      color: var(--primary);
      margin-bottom: 20px;
      font-size: 1.8rem;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    label {
      text-align: left;
      font-weight: 600;
      font-size: 0.95rem;
    }

    input, select {
      padding: 10px;
      border-radius: 8px;
      border: 1px solid #ccc;
      outline: none;
      transition: 0.3s;
    }

    input:focus, select:focus {
      border-color: var(--primary);
      box-shadow: 0 0 6px rgba(34, 36, 37, 0.4);
    }

    button {
      background: var(--primary);
      color: white;
      border: none;
      padding: 10px;
      border-radius: 8px;
      font-weight: bold;
      cursor: pointer;
      transition: 0.3s;
    }

    button:hover {
      background: var(--secondary);
      transform: translateY(-2px);
    }

    .error {
      color: red;
      margin-bottom: 10px;
    }

    footer {
      text-align: center;
      margin-top: 20px;
      font-size: 0.8rem;
      color: #555;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
  </style>
</head>
<body>

  <div class="login-box">
    <h2>Login Bimbel Online</h2>

    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
      <label for="role">Login Sebagai:</label>
      <select name="role" id="role" required>
        <option value="">-- Pilih Peran --</option>
        <option value="siswa">Siswa</option>
        <option value="guru">Guru</option>
        <option value="admin">Admin</option>
        <option value="owner">Owner</option>
      </select>

      <label>Username</label>
      <input type="text" name="username" required>

      <label>Password</label>
      <input type="password" name="password" required>

      <button type="submit">Masuk</button>
    </form>

    <footer>© 2025 Bimbel Online | Dikembangkan dengan 💙</footer>
  </div>

</body>
</html>
