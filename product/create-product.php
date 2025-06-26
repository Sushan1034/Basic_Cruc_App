<?php
require '../config/Database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $db->create("INSERT INTO products (title, price) VALUES (?, ?)", [
        $_POST['title'], $_POST['price']
    ]);
    header("Location: index.php");
    exit;
}
?>
<form method="POST" style="max-width: 350px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; font-family: Arial, sans-serif;">
    <input type="text" name="title" placeholder="Product Title" required
        style="width: 100%; padding: 10px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 5px;">
    <input type="number" name="price" placeholder="Price" required
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
    <button type="submit" style="width: 100%; padding: 12px; background: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Add Product</button>
</form>
<div style="text-align: center; margin-top: 15px;">
    <a href="product.php" style="color: #007BFF; text-decoration: none;">Back</a>
</div>
