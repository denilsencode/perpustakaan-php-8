<?php
require 'db.php';

$stmt = $pdo->query('SELECT * FROM buku');
$buku = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Daftar Buku</h1>
        <a href="create.php" class="btn btn-primary mb-3">Tambah Buku</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th> <!-- Kolom nomor urut -->
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Tahun Terbit</th>
                    <th>Genre</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1; // Inisialisasi nomor urut
                foreach ($buku as $b): ?>
                    <tr>
                        <td><?= $no++ ?></td> <!-- Tampilkan nomor urut -->
                        <td><?= $b['judul'] ?></td>
                        <td><?= $b['penulis'] ?></td>
                        <td><?= $b['tahun_terbit'] ?></td>
                        <td><?= $b['genre'] ?></td>
                        <td>
                            <a href="edit.php?id=<?= $b['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?= $b['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>