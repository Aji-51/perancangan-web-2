<?php
include "koneksi.php";
session_start();

if (isset($_POST['login'])) {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // PERBAIKAN: Gunakan id_user (sesuai screenshot database kamu)
    $stmt = mysqli_prepare($conn, "SELECT id_user, nama, role, password FROM users WHERE email = ?");
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if ($result && $user = mysqli_fetch_assoc($result)) {
            // Verifikasi password hash
            if (password_verify($password, $user['password'])) {
                // Gunakan id_user untuk session
                $_SESSION['id_user'] = $user['id_user'];
                $_SESSION['nama']    = $user['nama'];
                $_SESSION['role']    = $user['role'];

                // Pengalihan berdasarkan role di database
                switch ($user['role']) {
                    case 'admin':
                        header("Location: dashboard_admin.php");
                        break;
                    case 'guru':
                        header("Location: dashboard_guru.php");
                        break;
                    case 'owner':
                        header("Location: dashboard_owner.php");
                        break;
                    case 'siswa': // Tambahkan ini sesuai data screenshot
                        header("Location: dashboard_siswa.php");
                        break;
                    default:
                        // Jika tidak ada yang cocok, arahkan ke file utama
                        header("Location: index.php");
                }
                exit;
            } else {
                header("Location: login.php?error=1");
                exit;
            }
        } else {
            header("Location: login.php?error=1");
            exit;
        }
        mysqli_stmt_close($stmt);
    } else {
        header("Location: login.php?error=1");
        exit;
    }
}
?>