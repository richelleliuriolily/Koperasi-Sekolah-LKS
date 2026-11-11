<?php
session_start();
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = trim($_POST['name']);
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    try {
        $stmt = $pdo->prepare("UPDATE products SET name = ?, category_id = ?, price = ?, stock = ? WHERE id = ?");
        $stmt->execute([$name, $category_id, $price, $stock, $id]);

        header("Location: ../../pages/products/index.php?success=Produk berhasil diperbarui");
    } catch (PDOException $e) {
        header("Location: ../../pages/products/edit.php?id=$id&error=Gagal memperbarui produk");
    }
    exit();
}