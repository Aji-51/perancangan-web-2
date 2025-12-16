<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Panggil file PHPMailer
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Ambil data dari form
$nama        = $_POST['nama'];
$nim         = $_POST['nim'];
$kelas       = $_POST['kelas'];
$prodi       = $_POST['prodi'];
$universitas = $_POST['universitas'];
$email       = $_POST['email'];
$pesan       = $_POST['pesan'];

$mail = new PHPMailer(true);

try {
    // Konfigurasi Server Email
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ahmajinur94@gmail.com';      // GANTI
    $mail->Password   = 'sylb ywkw izos ozja';        // GANTI
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Pengirim & Penerima
    $mail->setFrom('ahmajinur94@gmail.com', 'Admin Kampus');
    $mail->addAddress($email);

    // Konten Email
    $mail->isHTML(true);
    $mail->Subject = 'Alert Mahasiswa';
    $mail->Body    = "
        <h3>Data Mahasiswa</h3>
        <table border='1' cellpadding='8' cellspacing='0'>
            <tr><td>Nama</td><td>$nama</td></tr>
            <tr><td>NIM</td><td>$nim</td></tr>
            <tr><td>Kelas</td><td>$kelas</td></tr>
            <tr><td>Prodi</td><td>$prodi</td></tr>
            <tr><td>Universitas</td><td>$universitas</td></tr>
        </table>
        <br>
        <b>Pesan:</b><br>
        $pesan
    ";

    $mail->send();
    echo "<script>
            alert('Email berhasil dikirim!');
            window.location='index.php';
          </script>";

} catch (Exception $e) {
    echo "<script>
            alert('Email gagal dikirim!');
            window.location='index.php';
          </script>";
}
?>
