<?php
// Latihan 4 - Membuat function
function hitungDiskon($harga, $persen) {
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

// Function tambahan 1: luas persegi panjang
function hitungLuasPersegiPanjang($panjang, $lebar) {
    return $panjang * $lebar;
}

// Function tambahan 2: menentukan kelulusan
function tentukanKelulusan($nilai) {
    return ($nilai >= 60) ? "LULUS" : "TIDAK LULUS";
}

$hargaAkhir = hitungDiskon(150000, 10);
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 4</title></head>
<body>
    <h2>Latihan 4 - Function</h2>
    <?php
    echo "<p>Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".") . "</p>";
    echo "<p>Luas persegi panjang (8 x 4): " . hitungLuasPersegiPanjang(8, 4) . "</p>";
    echo "<p>Nilai 72: " . tentukanKelulusan(72) . "</p>";
    echo "<p>Nilai 45: " . tentukanKelulusan(45) . "</p>";
    ?>
    <p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
