<?php
require '../config/Database.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database();
    $db->delete("DELETE FROM users WHERE id = ?", [$_POST['user_id']]);
}
header("Location: users.php");
?>