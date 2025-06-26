<?php
require '../config/Database.php';
$db = new Database();
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db->update("UPDATE users SET name = ?, address = ?, phone = ? WHERE id = ?", [
        $_POST['name'], $_POST['address'], $_POST['phone'], $id
    ]);
    header("Location: users.php");
}
$user = $db->select("SELECT * FROM users WHERE id = ?", [$id])[0];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
<form method="POST" style="max-width: 350px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; font-family: Arial, sans-serif;">
    <h3 style="text-align: center; margin-bottom: 15px;">Edit User</h3>
    <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required
        style="width: 100%; padding: 10px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 5px;">
    <input type="text" name="address" value="<?= htmlspecialchars($user['address']) ?>" required
        style="width: 100%; padding: 10px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 5px;">
    <input type="text" name="phone" value="<?= htmlspecialchars($user['phone']) ?>" required
        style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px;">
    <button type="submit"
        style="width: 100%; padding: 12px; background: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Update User</button>
</form>
<div style="text-align: center; margin-top: 15px;">
    <a href="users.php" style="color: #007BFF; text-decoration: none;">Back</a>
</div>
</body>
</html>
