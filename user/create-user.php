<?php
require '../config/Database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $db->create("INSERT INTO users (name, address, phone) VALUES (?, ?, ?)", [
        $_POST['name'], $_POST['address'], $_POST['phone']
    ]);
    header("Location: users.php");
}
?>
<form method="POST" style="max-width: 350px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; font-family: Arial, sans-serif;">
    <h3 style="text-align: center; margin-bottom: 15px;">Add User</h3>
    <input type="text" name="name" placeholder="Name" required
        style="width: 100%; padding: 10px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 5px;">
    <input type="text" name="address" placeholder="Address" required
        style="width: 100%; padding: 10px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 5px;">
    <input type="text" name="phone" placeholder="Phone" required
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
    <button type="submit" style="width: 100%; padding: 12px; background: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Add User</button>
</form>
<div style="text-align: center; margin-top: 15px;">
    <a href="users.php" style="color: #007BFF; text-decoration: none;">Back</a>
</div>
