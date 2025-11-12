<?php

// Fungsi untuk format angka ke Rupiah
function formatRupiah($angka) {
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Cek apakah data sudah dikirim melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Ambil data dari form
    // Menggunakan (float) dan (int) untuk memastikan tipe data yang benar
    $saldo_awal = (float)$_POST['saldo_awal'];
    $bunga_persen = (float)$_POST['bunga_perbulan'];
    $lama_bulan = (int)$_POST['lama_bulan'];
    
    // 2. Logika Perhitungan (Bunga Flat dari Saldo Awal)
    
    // Hitung Bunga (Rupiah) per bulan
    // Rumus: Saldo Awal * (Bunga Persen / 100)
    $bunga_per_bulan = $saldo_awal * ($bunga_persen / 100);
    
    // Hitung Bunga Total selama periode menabung
    // Rumus: Bunga per bulan * Lama Bulan
    $bunga_total = $bunga_per_bulan * $lama_bulan;
    
    // Hitung Saldo Akhir
    // Rumus: Saldo Awal + Bunga Total
    $saldo_akhir = $saldo_awal + $bunga_total;
    
    // 3. Tampilkan Hasil dalam format HTML yang rapi
    ?>

    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Hasil Perhitungan Saldo</title>
        <style>
            body { font-family: Arial, sans-serif; padding: 20px; background-color: #e8f5e9; }
            .result-box { background: #ffffff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.15); max-width: 500px; margin: 50px auto; border-left: 5px solid #4CAF50; }
            h2 { color: #2e7d32; text-align: center; margin-bottom: 25px; }
            .detail { margin-bottom: 10px; padding: 8px; border-bottom: 1px solid #eee; }
            .detail strong { display: inline-block; width: 180px; color: #555; }
            .final-saldo { background-color: #c8e6c9; padding: 15px; border-radius: 4px; margin-top: 20px; text-align: center; font-size: 1.2em; font-weight: bold; color: #1b5e20; }
            .back-link { display: block; text-align: center; margin-top: 25px; }
        </style>
    </head>
    <body>

        <div class="result-box">
            <h2>💰 Hasil Perhitungan Saldo Akhir</h2>
            
            <div class="detail"><strong>Saldo Awal:</strong> <?php echo formatRupiah($saldo_awal); ?></div>
            <div class="detail"><strong>Bunga Per Bulan:</strong> <?php echo $bunga_persen; ?> %</div>
            <div class="detail"><strong>Lama Menabung:</strong> <?php echo $lama_bulan; ?> bulan</div>
            
            <hr>
            
            <div class="detail"><strong>Bunga (per bulan):</strong> <?php echo formatRupiah($bunga_per_bulan); ?></div>
            <div class="detail"><strong>Total Bunga (<?php echo $lama_bulan; ?> bulan):</strong> <?php echo formatRupiah($bunga_total); ?></div>
            
            <div class="final-saldo">
                SALDO AKHIR: <?php echo formatRupiah($saldo_akhir); ?>
            </div>
            
            <div class="back-link">
                <a href="form_saldo.html">Kembali ke Kalkulator</a>
            </div>
        </div>

    </body>
    </html>

    <?php

} else {
    // Jika diakses tanpa submit form (langsung ke file PHP), arahkan kembali
    header("Location: proses jumlah uang.html");
    exit();
}
?>