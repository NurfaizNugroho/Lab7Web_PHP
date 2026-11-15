<!DOCTYPE html>
<html lang="id">
<head><meta charset="UTF-8"><title>Latihan 5 - GET</title></head>
<body>
    <h2>Latihan 5 - Form GET</h2>
    <form method="GET" action="">
        <label for="kata">Kata kunci:</label>
        <input id="kata" name="kata" type="text">
        <button type="submit">Cari</button>
    </form>
    <?php
    if (isset($_GET["kata"])) {
        $kata = trim($_GET["kata"]);
        echo "<p>Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8") . "</p>";
    }
    ?>
    <p><small>Perhatikan URL berubah menjadi ?kata=... setelah form dikirim.</small></p>
    <p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
