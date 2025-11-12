<?php
// Diketahui
$saldoAwal = 1000000;    // Saldo awal Rp 1.000.000
$bunga = 0.0025;         // Bunga 0,25% per bulan (0.25/100)
$bulan = 11;             // Lama menabung 11 bulan

// Perhitungan saldo akhir (bunga tunggal)
$saldoAkhir = $saldoAwal + ($saldoAwal * $bunga * $bulan);

// Tampilkan hasil
echo "Saldo awal: Rp " . number_format($saldoAwal, 0, ',', '.') . "<br>";
echo "Bunga per bulan: " . ($bunga * 100) . "%<br>";
echo "Lama menabung: " . $bulan . " bulan<br>";
echo "Saldo akhir setelah " . $bulan . " bulan adalah: <b>Rp " . number_format($saldoAkhir, 0, ',', '.') . ",-</b>";
?>
