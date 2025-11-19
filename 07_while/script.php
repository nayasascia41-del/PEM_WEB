<?php

$jumlah = 0;

for ($x = 1; $x <= 25; $x++) {
    for ($y = 1; $y <= 25; $y++) {
        for ($z = 1; $z <= 25; $z++) {

            if (($x + $y + $z) == 25) {
                echo "x = $x, y = $y, z = $z <br>";
                $jumlah++;
            }
        }
    }
}

echo "<br><b>Jumlah penyelesaian : $jumlah</b>";

?>