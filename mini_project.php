<?php
// ===== BAGIAN PEMROSESAN (logika) =====
$data  = null;
$error = [];
$nama = $nim = $prodi = $semesterInput = $email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama          = trim($_POST["nama"] ?? "");
    $nim           = trim($_POST["nim"] ?? "");
    $prodi         = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email         = trim($_POST["email"] ?? "");

    if ($nama === "")  $error[] = "Nama wajib diisi.";
    if ($nim === "")   $error[] = "NIM wajib diisi.";
    // Eksperimen 4: NIM hanya angka, panjang 8-12 digit
    elseif (!ctype_digit($nim) || strlen($nim) < 8 || strlen($nim) > 12) {
        $error[] = "NIM harus berupa angka 8-12 digit.";
    }
    if ($prodi === "") $error[] = "Program studi wajib diisi.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }
    if (!ctype_digit((string)$semesterInput) ||
        (int)$semesterInput < 1 || (int)$semesterInput > 14) {
        $error[] = "Semester harus berupa angka 1-14.";
    }

    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int)$semesterInput;
    }
}

// Helper untuk escape output
function e($teks) {
    return htmlspecialchars((string)$teks, ENT_QUOTES, "UTF-8");
}
?>
<!-- ===== BAGIAN TAMPILAN (HTML) ===== -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Mini Project - Formulir Data Mahasiswa</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 520px; margin: 30px auto; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input { width: 100%; padding: 6px; box-sizing: border-box; }
        button { margin-top: 16px; padding: 8px 16px; }
        .error { background: #fdecea; border: 1px solid #f5c2c0; padding: 10px; color: #a00; }
        .sukses { background: #e8f5e9; border: 1px solid #a5d6a7; padding: 10px; }
    </style>
</head>
<body>
    <h2>Formulir Data Mahasiswa</h2>

    <?php if ($error): ?>
        <div class="error">
            <strong>Terdapat kesalahan:</strong>
            <ul>
                <?php foreach ($error as $pesan): ?>
                    <li><?= e($pesan) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($data): ?>
        <div class="sukses">
            <h3>Ringkasan Data Mahasiswa</h3>
            <p>Nama: <?= e($data["nama"]) ?></p>
            <p>NIM: <?= e($data["nim"]) ?></p>
            <p>Program Studi: <?= e($data["prodi"]) ?></p>
            <p>Semester: <?= e($data["semester"]) ?></p>
            <p>Email: <?= e($data["email"]) ?></p>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <label for="nama">Nama</label>
        <input id="nama" name="nama" type="text" value="<?= e($nama) ?>">

        <label for="nim">NIM</label>
        <input id="nim" name="nim" type="text" value="<?= e($nim) ?>">

        <label for="prodi">Program Studi</label>
        <input id="prodi" name="prodi" type="text" value="<?= e($prodi) ?>">

        <label for="semester">Semester (1-14)</label>
        <input id="semester" name="semester" type="text" value="<?= e($semesterInput) ?>">

        <label for="email">Email</label>
        <input id="email" name="email" type="text" value="<?= e($email) ?>">

        <button type="submit">Kirim</button>
        <button type="reset">Reset</button>
    </form>
    <p><a href="index.php">&laquo; Kembali</a></p>
</body>
</html>
