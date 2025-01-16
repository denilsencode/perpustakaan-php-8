<?php
require 'db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $genre = $_POST['genre'];

    $stmt = $pdo->prepare('UPDATE buku SET judul = ?, penulis = ?, tahun_terbit = ?, genre = ? WHERE id = ?');
    $stmt->execute([$judul, $penulis, $tahun_terbit, $genre, $id]);

    header('Location: index.php');
    exit;
}

$stmt = $pdo->prepare('SELECT * FROM buku WHERE id = ?');
$stmt->execute([$id]);
$buku = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Edit Buku</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $buku['judul'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" value="<?= $buku['penulis'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="tahun_terbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit" value="<?= $buku['tahun_terbit'] ?>" required>
            </div>
            <div class="mb-3">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" class="form-control" id="genre" name="genre" value="<?= $buku['genre'] ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>