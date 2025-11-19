<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $saldo = $_POST['saldo_awal'];
    $bulan = $_POST['bulan'];

    for ($i = 1; $i <= $bulan; $i++) {
        
        // Menentukan bunga per bulan berdasarkan saldo terakhir
        if ($saldo < 1100000) {
            $bunga = 0.03 * $saldo; // 3%
        } else {
            $bunga = 0.04 * $saldo; // 4%
        }

        // Tambah bunga
        $saldo += $bunga;

        // Kurangi biaya admin Rp 9.000
        $saldo -= 9000;
    }

    echo "<h2>Hasil Perhitungan</h2>";
    echo "Saldo Awal: Rp " . number_format($_POST['saldo_awal'], 0, ',', '.') . "<br>";
    echo "Lama menabung: $bulan bulan<br><br>";
    echo "<b>Saldo Akhir: Rp " . number_format($saldo, 0, ',', '.') . "</b>";
}
?>