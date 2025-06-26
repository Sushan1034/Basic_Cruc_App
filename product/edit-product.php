<?php
require '../config/Database.php';
$db = new Database();
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->update("UPDATE products SET title = ?, price = ? WHERE id = ?", [
        $_POST['title'], $_POST['price'], $id
    ]);
    header("Location: index.php");
}
$product = $db->select("SELECT * FROM products WHERE id = ?", [$id])[0];
?>
<form method="POST" style="max-width: 350px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; font-family: Arial, sans-serif;">
    <h3 style="text-align: center; margin-bottom: 15px;">Edit Product</h3>
    <input type="text" name="title" value="<?= htmlspecialchars($product['title']) ?>" required
        style="width: 100%; padding: 10px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 5px;">
    <input type="number" name="price" value="<?= htmlspecialchars($product['price']) ?>" required
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
    <button type="submit" style="width: 100%; padding: 12px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Update Product</button>
</form>
<div style="text-align: center; margin-top: 15px;">
    <a href="product.php" style="color: #007BFF; text-decoration: none;">Back</a>
</div>
