<?php require '../config/Database.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Product Management</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0; padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: 30px auto;
            background: #fff;
            padding: 25px 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        h1 {
            text-align: center;
            color: #222;
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
        .action-buttons a,
        .action-buttons button {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            border: none;
            margin-right: 8px;
            transition: background-color 0.3s ease;
        }
        .action-buttons a {
            background: #28a745;
            color: white;
        }
        .action-buttons a:hover {
            background: #1e7e34;
        }
        .action-buttons button {
            background: #dc3545;
            color: white;
        }
        .action-buttons button:hover {
            background: #a71d2a;
        }
        form {
            display: inline;
        }
        div {
            text-align: center;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Product Management</h1>
    <a href="create-product.php" class="btn">Add Product</a>
    <table>
        <thead>
            <tr>
                <th>S.N.</th><th>Title</th><th>Price</th><th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $db = new Database();
        $products = $db->select("SELECT * FROM products");
        $i = 1;
        foreach ($products as $product):
        ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= htmlspecialchars($product['title']) ?></td>
                <td><?= htmlspecialchars($product['price']) ?></td>
                <td>
                    <div class="action-buttons">
                        <a href="edit-product.php?id=<?= $product['id'] ?>">Edit</a>
                        <form method="POST" action="delete-product.php" onsubmit="return confirm('Are you sure?');">
                            <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                            <button type="submit">Delete</button>
                        </form>
                    </div>
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
