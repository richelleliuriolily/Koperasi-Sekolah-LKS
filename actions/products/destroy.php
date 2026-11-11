<?php
session_start();
require_once '../../config/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: ../../pages/products/index.php?success=Produk berhasil dihapus");
    } catch (PDOException $e) {
        header("Location: ../../pages/products/index.php?error=Gagal menghapus produk");
    }
    exit();
}