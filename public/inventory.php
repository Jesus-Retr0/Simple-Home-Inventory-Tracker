<?php
require_once __DIR__ . '/../config/db.php';

$sql = "SELECT id, name, category, quantity, location FROM items ORDER BY name ASC";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inventory - Home Inventory Tracker</title>
        <link rel="stylesheet" href="../src/inventory_style.css">
</head>
<body>
    <div class="container">
        <h2>Inventory List</h2>
        <p><a href="add_item.php">Add New Item</a> | <a href="index.html">Back to Dashboard</a></p>
        <table>
            <tr>
                <th>Item Name</th>
                <th>Category</th>
                <th>Quantity</th>
                <th>Location</th>
                <th></th>
            </tr>
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['category']) ?></td>
                        <td><?= (int)$row['quantity'] ?></td>
                        <td><?= htmlspecialchars($row['location']) ?></td>
                        <td class="actions">
                            <a href="../config/edit_item.php?id=<?= $row['id'] ?>">Modify</a>
                            <a href="../config/delete_item.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr><td colspan="4">No items found.</td></tr>
            <?php endif; ?>
        </table>
    </div>
</body>
</html>