<?php
// Latihan 3 - Perulangan dan array
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Eka", "Fajar", "Gita"]; // 3 nama tambahan: Eka, Fajar, Gita
?>
<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 3</title></head>
<body>
    <h2>Latihan 3 - Perulangan dan Array</h2>
    <?php
    echo "<h3>Daftar Mahasiswa</h3><ol>";
    foreach ($mahasiswa as $nama) {
        echo "<li>" . htmlspecialchars($nama) . "</li>";
    }
    echo "</ol>";
    echo "<p>Jumlah mahasiswa: " . count($mahasiswa) . "</p>";
    ?>
    <p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
