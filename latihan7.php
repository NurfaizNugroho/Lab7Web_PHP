<?php
// Latihan 7 - Pengolahan data sederhana (transaksi)
$barang   = "";
$error    = null;
$subtotal = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $barang      = trim($_POST["barang"] ?? "");
    $hargaInput  = $_POST["harga"] ?? "";
    $jumlahInput = $_POST["jumlah"] ?? "";

    if ($barang === "" || !is_numeric($hargaInput) ||
        !ctype_digit((string)$jumlahInput) ||
        (float)$hargaInput < 0 || (int)$jumlahInput < 1) {
        $error = "Periksa kembali nama barang, harga, dan jumlah.";
    } else {
        $harga    = (float)$hargaInput;
        $jumlah   = (int)$jumlahInput;
        $subtotal = $harga * $jumlah;
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 7</title></head>
<body>
    <h2>Latihan 7 - Hitung Subtotal</h2>
    <form method="POST">
        <label>Nama barang <input name="barang" required></label><br><br>
        <label>Harga <input name="harga" type="number" min="0" step="0.01" required></label><br><br>
        <label>Jumlah <input name="jumlah" type="number" min="1" step="1" required></label><br><br>
        <button type="submit">Hitung</button>
    </form>
    <?php
    if ($error !== null) {
        echo "<p style='color:red'>" . htmlspecialchars($error) . "</p>";
    } elseif ($subtotal !== null) {
        echo "<p>Barang: " . htmlspecialchars($barang) . "</p>";
        echo "<p>Subtotal: Rp" . number_format($subtotal, 0, ",", ".") . "</p>";
    }
    ?>
    <p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
