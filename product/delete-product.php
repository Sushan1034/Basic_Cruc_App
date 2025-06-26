<?php
require '../config/Database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $db->delete("DELETE FROM products WHERE id = ?", [$_POST['product_id']]);
}
header("Location: index.php");
?>