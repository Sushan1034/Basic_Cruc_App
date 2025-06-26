<?php
require '../config/Database.php';
session_start();
$db = new Database();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = $db->select("SELECT * FROM admin_users WHERE username = ?", [$username]);

    if ($user && $password === $user[0]['password']) { // Plain text comparison
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header("Location: ../index.php"); // redirect properly
        exit();
    } else {
        $error = "Invalid login credentials!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>
    <form method="POST" style="max-width: 350px; margin: 40px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; font-family: Arial, sans-serif;">
        <h2 style="text-align:center;">Login</h2>
        <input type="text" name="username" placeholder="Username" required autofocus
        style="width: 95%; padding: 10px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 5px;">
        <br><br>
        <input type="password" name="password" placeholder="Password" required
        style="width: 95%; padding: 10px; margin-bottom: 12px; border: 1px solid #ccc; border-radius: 5px;">
        <br><br>
        <button type="submit" style="width: 100%; padding: 12px; background: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Login</button>
    </form>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
</body>
</html>
