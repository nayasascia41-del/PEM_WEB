<!DOCTYPE html>
<html>
<head>
    <title>Form Hitung Saldo Akhir</title>
</head>
<body>

<h2>Form Pengisian Data Tabungan</h2>

<form action="proses hitung.php" method="POST">
    Saldo Awal (Rp): <br>
    <input type="number" name="saldo_awal" required><br><br>

    Lama Menabung (bulan): <br>
    <input type="number" name="bulan" required><br><br>

    <button type="submit">Hitung Saldo Akhir</button>
</form>

</body>
</html>