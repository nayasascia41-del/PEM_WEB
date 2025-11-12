<?php
// Konstanta
define('BATAS_NORMAL', 48);
define('UPAH_NORMAL', 2000);
define('UPAH_LEMBUR', 3000);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Ambil nilai jam kerja dari input
    $jam_kerja = (float)$_POST["jam_kerja"];
    $total_gaji = 0;
    $jam_normal = 0;
    $jam_lembur = 0;
    
    // 2. Logika Perhitungan Gaji
    if ($jam_kerja > BATAS_NORMAL) {
        // Ada Lembur (Jam kerja > 48)
        $jam_normal = BATAS_NORMAL;
        $jam_lembur = $jam_kerja - BATAS_NORMAL;
        
        $gaji_normal = $jam_normal * UPAH_NORMAL;
        $gaji_lembur = $jam_lembur * UPAH_LEMBUR;
        
        $total_gaji = $gaji_normal + $gaji_lembur;
    } else {
        // Tidak Ada Lembur (Jam kerja <= 48)
        $jam_normal = $jam_kerja;
        $jam_lembur = 0;
        
        $gaji_normal = $jam_normal * UPAH_NORMAL;
        $gaji_lembur = 0;
        
        $total_gaji = $gaji_normal;
    }
} else {
    // Jika diakses tanpa form submission
    header("Location: soal2.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Perhitungan Gaji</title>
    <style>
        h3 { color: darkgreen; }
    </style>
</head>
<body>

    <h2>Hasil Perhitungan Upah Mingguan</h2>
    <p>Total Jam Kerja yang dimasukkan: **<?php echo $jam_kerja; ?> jam**</p>
    <hr>
    
    <h4>Detail Perhitungan:</h4>
    <ul>
        <li>Jam Kerja Normal (<?php echo $jam_normal; ?> jam @Rp <?php echo number_format(UPAH_NORMAL); ?>): 
            **Rp <?php echo number_format($gaji_normal); ?>**</li>
        
        <?php if ($jam_lembur > 0): ?>
            <li>Jam Lembur (<?php echo $jam_lembur; ?> jam @Rp <?php echo number_format(UPAH_LEMBUR); ?>): 
                **Rp <?php echo number_format($gaji_lembur); ?>**</li>
        <?php endif; ?>
    </ul>

    <h3>TOTAL UPAH DITERIMA: **Rp <?php echo number_format($total_gaji); ?>**</h3>

    <a href="gaji_form.html">Hitung Gaji Karyawan Lain</a>

</body>
</html>