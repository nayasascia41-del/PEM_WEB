<?php
// Jumlah total uang yang akan diambil
$jumlahUang = 1575250;

// Hitung masing-masing pecahan
$a = intdiv($jumlahUang, 100000);       // Jumlah pecahan Rp 100.000
$sisa = $jumlahUang % 100000;

$b = intdiv($sisa, 50000);              // Jumlah pecahan Rp 50.000
$sisa = $sisa % 50000;

$c = intdiv($sisa, 20000);              // Jumlah pecahan Rp 20.000
$sisa = $sisa % 20000;

$d = intdiv($sisa, 5000);               // Jumlah pecahan Rp 5.000
$sisa = $sisa % 5000;

$e = intdiv($sisa, 100);                // Jumlah pecahan Rp 100
$sisa = $sisa % 100;

$f = intdiv($sisa, 50);                 // Jumlah pecahan Rp 50
$sisa = $sisa % 50;

// Tampilkan hasil
echo "Jumlah uang yang diambil: Rp " . number_format($jumlahUang, 0, ',', '.') . "<br><br>";
echo "Jumlah pecahan:<br>";
echo "Rp 100.000 : " . $a . " lembar<br>";
echo "Rp 50.000  : " . $b . " lembar<br>";
echo "Rp 20.000  : " . $c . " lembar<br>";
echo "Rp 5.000   : " . $d . " lembar<br>";
echo "Rp 100     : " . $e . " keping<br>";
echo "Rp 50      : " . $f . " keping<br>";
?>
