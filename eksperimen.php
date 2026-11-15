<?php
// Eksperimen Mandiri

// 1. Rata-rata tiga komponen nilai
function hitungRataRata($a, $b, $c) {
    return ($a + $b + $c) / 3;
}

// 3. Function format Rupiah
function formatRupiah($angka) {
    return "Rp" . number_format($angka, 0, ",", ".");
}

// 2. Pencarian nama dari array (GET)
$dataNama = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita"];
$hasil = [];
$cari  = trim($_GET["cari"] ?? "");
if ($cari !== "") {
    foreach ($dataNama as $n) {
        if (stripos($n, $cari) !== false) {
            $hasil[] = $n;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Eksperimen Mandiri</title></head>
<body>
    <h2>Eksperimen Mandiri</h2>

    <h3>1. Rata-rata nilai (80, 75, 90)</h3>
    <p><?= number_format(hitungRataRata(80, 75, 90), 2) ?></p>

    <h3>2. Cari nama (GET)</h3>
    <form method="GET" action="">
        <input name="cari" type="text" value="<?= htmlspecialchars($cari, ENT_QUOTES, 'UTF-8') ?>">
        <button type="submit">Cari</button>
    </form>
    <?php if ($cari !== ""): ?>
        <?php if ($hasil): ?>
            <ul>
                <?php foreach ($hasil as $n): ?>
                    <li><?= htmlspecialchars($n) ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else: ?>
            <p>Nama tidak ditemukan.</p>
        <?php endif; ?>
    <?php endif; ?>

    <h3>3. Format Rupiah</h3>
    <p><?= formatRupiah(1500000) ?> &nbsp;|&nbsp; <?= formatRupiah(25000) ?></p>

    <h3>4. Validasi NIM</h3>
    <p>Sudah diterapkan pada <a href="mini_project.php">mini_project.php</a> (angka saja, 8-12 digit).</p>

    <h3>5. Tombol Reset</h3>
    <p>Sudah ditambahkan pada <a href="mini_project.php">mini_project.php</a>.
    Reset hanya mengosongkan isian form di browser (client-side) tanpa mengirim request ke server,
    sedangkan submit mengirim data ke server untuk diproses ulang oleh PHP.</p>
    <p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
