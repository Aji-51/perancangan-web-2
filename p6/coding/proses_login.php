<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = mysqli_real_escape_string($koneksi, $_POST['password']);
    $role     = $_POST['role'];

    // konfigurasi role
    $roleConfig = [
        'admin' => ['table'=>'admin','id'=>'id_admin','redirect'=>'admin_index.php'],
        'siswa' => ['table'=>'siswa','id'=>'id_siswa','redirect'=>'index.php'],
        'guru'  => ['table'=>'guru','id'=>'id_guru','redirect'=>'guru_index.php'],
        'owner' => ['table'=>'owner','id'=>'id_owner','redirect'=>'owner_index.php']
    ];

    if (!isset($roleConfig[$role])) {
        $_SESSION['error'] = "Role tidak dikenali!";
        header("Location: login.php");
        exit;
    }

    $table    = $roleConfig[$role]['table'];
    $idColumn = $roleConfig[$role]['id'];
    $redirect = $roleConfig[$role]['redirect'];

    $query = mysqli_query($koneksi, "
        SELECT * FROM $table 
        WHERE username='$username' AND password='$password'
        LIMIT 1
    ");

    if (mysqli_num_rows($query) === 1) {

        $data = mysqli_fetch_assoc($query);

        $_SESSION['id']       = $data[$idColumn];
        $_SESSION['nama']     = $data['nama'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role']     = $role;

        header("Location: $redirect");
        exit;

    } else {
        $_SESSION['error'] = "Username atau password salah!";
        header("Location: login.php");
        exit;
    }
}
?>
