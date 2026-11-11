<?php
session_start();
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    try {
        $stmt = $pdo->prepare("INSERT INTO products (name, category_id, price, stock) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $category_id, $price, $stock]);

        header("Location: ../../pages/products/index.php?success=Produk berhasil ditambahkan");
    } catch (PDOException $e) {
        header("Location: ../../pages/products/create.php?error=Gagal menambahkan produk");
    }
    exit();
}