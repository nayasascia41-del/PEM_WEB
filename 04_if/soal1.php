<?php
// Pastikan form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Ambil nilai tahun dari input dengan kunci 'tahun'
    $tahun = (int)$_POST["tahun"];
    $hasil = "";
    
    // 2. Logika Tahun Kabisat:
    // (Habis dibagi 400) ATAU ((Habis dibagi 4) DAN (TIDAK habis dibagi 100))
    if (($tahun % 400 == 0) || (($tahun % 4 == 0) && ($tahun % 100 != 0))) {
        $hasil = "<strong>TAHUN KABISAT</strong>";
    } else {
        $hasil = "<strong>BUKAN TAHUN KABISAT</strong>";
    }
} else {
    // Jika diakses tanpa form submission
    header("Location: kabisat_form.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Cek Tahun Kabisat</title>
</head>
<body>

    <h2>Hasil Cek Tahun Kabisat</h2>
    <p>Tahun yang Anda masukkan: **<?php echo $tahun; ?>**</p>
    <p>Status: **<?php echo $hasil; ?>**</p>
    
    <a href="kabisat_form.html">Cek Tahun Lain</a>

</body>
</html>