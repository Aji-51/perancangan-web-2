<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

// ================= PHPMailer =================
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/PHPMailer/Exception.php';
require __DIR__ . '/PHPMailer/PHPMailer.php';
require __DIR__ . '/PHPMailer/SMTP.php';


// ================= FPDF =================
require 'fpdf186/fpdf.php';

// Biar tidak muter lama
set_time_limit(30);

// ================= AMBIL DATA FORM =================
$nama        = $_POST['nama'] ?? '';
$nim         = $_POST['nim'] ?? '';
$kelas       = $_POST['kelas'] ?? '';
$prodi       = $_POST['prodi'] ?? '';
$universitas = $_POST['universitas'] ?? '';
$email       = $_POST['email'] ?? '';
$pesan       = $_POST['pesan'] ?? '';

// ================= SIMPAN KE DATABASE =================
$sql = "INSERT INTO user_blog
(nama, nim, kelas, prodi, universitas, email, pesan)
VALUES
('$nama','$nim','$kelas','$prodi','$universitas','$email','$pesan')";

mysqli_query($koneksi, $sql);

// ================= BUAT PDF =================
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'DATA MAIL ALERT',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','',12);
$pdf->Cell(50,8,'Nama',0,0);        $pdf->Cell(0,8,": $nama",0,1);
$pdf->Cell(50,8,'NIM',0,0);         $pdf->Cell(0,8,": $nim",0,1);
$pdf->Cell(50,8,'Kelas',0,0);       $pdf->Cell(0,8,": $kelas",0,1);
$pdf->Cell(50,8,'Prodi',0,0);       $pdf->Cell(0,8,": $prodi",0,1);
$pdf->Cell(50,8,'Universitas',0,0); $pdf->Cell(0,8,": $universitas",0,1);

$pdf->Ln(5);
$pdf->MultiCell(0,8,"Pesan:\n$pesan");

// Simpan PDF ke server
$nama_pdf = "mail_alert_" . time() . ".pdf";
$pdf->Output("F", $nama_pdf);

// ================= KIRIM EMAIL =================
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'ahmajinur94@gmail.com';

    // 🔴 GANTI dengan APP PASSWORD TANPA SPASI
    $mail->Password   = 'amzzaiyukndzsvkv';

    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->Timeout = 5;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom('ahmajinur94@gmail.com', 'Mail Alert System');
    $mail->addAddress($email);

    $mail->addAttachment($nama_pdf);

    $mail->isHTML(true);
    $mail->Subject = 'Mail Alert - PDF';
    $mail->Body    = "
        <p>Halo <b>$nama</b>,</p>
        <p>Berikut data yang Anda kirimkan dalam bentuk PDF.</p>
        <p>Terima kasih.</p>
    ";

    $mail->send();

    echo "<script>
        alert('Data berhasil dikirim ke email!');
        window.location='form.php';
    </script>";
    exit;

} catch (Exception $e) {
    echo "Email gagal dikirim: " . $mail->ErrorInfo;
    exit;
}
?>
