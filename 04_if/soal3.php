<?php
// Konstanta umum
define('BATAS_NORMAL', 48);
define('UPAH_LEMBUR', 3000);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil input
    $golongan  = $_POST["golongan"];
    $jam_kerja = (float)$_POST["jam_kerja"];
    $upah_normal_per_jam = 0;
    
    // 1. Tentukan Upah Normal per Jam berdasarkan Golongan menggunakan SWITCH
    switch ($golongan) {
        case 'A':
            $upah_normal_per_jam = 4000;
            break;
        case 'B':
            $upah_normal_per_jam = 5000;
            break;
        case 'C':
            $upah_normal_per_jam = 6000;
            break;
        case 'D':
            $upah_normal_per_jam = 7500;
            break;
        default:
            // Handle jika golongan tidak valid
            $upah_normal_per_jam = 0;
            echo "<p>Golongan tidak valid.</p>";
            exit;
    }
    
    // 2. Hitung Jam Normal dan Jam Lembur
    if ($jam_kerja > BATAS_NORMAL) {
        $jam_normal = BATAS_NORMAL;
        $jam_lembur = $jam_kerja - BATAS_NORMAL;
    } else {
        $jam_normal = $jam_kerja;
        $jam_lembur = 0;
    }
    
    // 3. Hitung Gaji Total
    $gaji_normal = $jam_normal * $upah_normal_per_jam;
    $gaji_lembur = $jam_lembur * UPAH_LEMBUR;
    $total_gaji  = $gaji_normal + $gaji_lembur;
} else {
    // Jika diakses tanpa form submission
    header("Location: soal3.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Hasil Gaji Karyawan</title>
</head>
<body>

    <h2>Hasil Perhitungan Upah Karyawan</h2>
    <p>Golongan Karyawan: **<?php echo $golongan; ?>**</p>
    <p>Upah Normal per Jam: **Rp <?php echo number_format($upah_normal_per_jam); ?>**</p>
    <p>Total Jam Kerja: **<?php echo $jam_kerja; ?> jam**</p>
    <hr>
    
    <h4>Detail Upah:</h4>
    <ul>
        <li>Gaji Normal (<?php echo $jam_normal; ?> jam): **Rp <?php echo number_format($gaji_normal); ?>**</li>
        <?php if ($jam_lembur > 0): ?>
            <li>Gaji Lembur (<?php echo $jam_lembur; ?> jam @Rp <?php echo number_format(UPAH_LEMBUR); ?>): 
                **Rp <?php echo number_format($gaji_lembur); ?>**</li>
        <?php endif; ?>
    </ul>

    <h3>TOTAL UPAH DITERIMA: **Rp <?php echo number_format($total_gaji); ?>**</h3>

    <a href="soal3.html">Hitung Upah Karyawan Lain</a>

</body>
</html>