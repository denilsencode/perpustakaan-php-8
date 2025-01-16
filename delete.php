<?php
require 'db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

// Hapus data
$stmt = $pdo->prepare('DELETE FROM buku WHERE id = ?');
$stmt->execute([$id]);

// Reset auto-increment
$pdo->exec('ALTER TABLE buku AUTO_INCREMENT = 1');

// Update ID agar berurutan
$stmt = $pdo->query('SELECT id FROM buku ORDER BY id');
$books = $stmt->fetchAll();

$count = 1;
foreach ($books as $book) {
    $pdo->prepare('UPDATE buku SET id = ? WHERE id = ?')->execute([$count, $book['id']]);
    $count++;
}

header('Location: index.php');
exit;
