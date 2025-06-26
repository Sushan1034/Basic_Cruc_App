<?php require '../config/Database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>User Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            margin: 0; padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: white;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }
        .btn {
            display: inline-block;
            background: #007BFF;
            color: white;
            padding: 10px 18px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        thead tr {
            background: #007BFF;
            color: white;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: left;
        }
        tbody tr:nth-child(even) {
            background: #f9f9f9;
        }
        tbody tr:hover {
            background: #e6f0ff;
        }
        form {
            display: inline;
        }
        form button {
            background: #dc3545;
            color: white;
            border: none;
            padding: 6px 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background: #a71d2a;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>User Management</h1>
    <a href="create-user.php" class="btn">Add User</a>
    <table>
        <thead>
            <tr><th>S.N.</th><th>Name</th><th>Address</th><th>Phone</th><th>Actions</th></tr>
        </thead>
        <tbody>
        <?php
        $db = new Database();
        $users = $db->select("SELECT * FROM users");
        $i = 1;
        foreach ($users as $user):
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($user['name']) ?></td>
                <td><?= htmlspecialchars($user['address']) ?></td>
                <td><?= htmlspecialchars($user['phone']) ?></td>
                <td>
                    <a href="edit-user.php?id=<?= $user['id'] ?>">Edit</a>
                    <form method="POST" action="delete-user.php" onsubmit="return confirm('Are you sure you want to delete this user?');">
                        <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <a href="../index.php" class="btn">Back To Home</a>
    </div>
</div>
</body>
</html>
