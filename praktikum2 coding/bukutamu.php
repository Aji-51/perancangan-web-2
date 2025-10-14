<html> 
<head> 
<title>Contoh Form dengan POST</title> 
</head> 
<body> 
<h1>Buku Tamu</h1> 
Halo Semuanya Sebelumnya Isi data terlebih dahulu.
<hr>
Silahkan isi data diri kalian dibawah
<hr> 
<form action="proc_bukutamu.php" method="post"> 
<pre> 
Nama anda : <input type="text" name="nama" size="25" 
maxlength="50"> 
Email address : <input type="text" name="email" size="25" 
maxlength="50"> 
Komentar : <textarea name="komentar" cols="40" 
rows="5"> </textarea> 
<input type="submit" value="kirim"> 
<input type="reset" value="ulangi"> 
</pre> 
</form> 
</body> 
</html>