<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: auth/login.php');
    exit();
}
?>

<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Basic PHP CRUD - Home</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container">
    <h1 style="text-align: center;">Hello Admin</h1>
    <h1 style="text-align: center;">Choose what you want to perform</h1>
    <div style="display: flex; gap: 20px; justify-content: center; margin-top: 40px;">
        <a href="product/product.php" class="btn">📦 Manage Products</a>
        <a href="user/users.php" class="btn">👤 Manage Users</a>
        <a href="auth/logout.php" style="width: 10%; padding: 12px; background: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block; text-align: center;">Logout</a> </div>
</div>
</body>
</html>