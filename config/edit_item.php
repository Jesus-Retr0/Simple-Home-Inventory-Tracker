<?php
require_once __DIR__ . '/db.php';

$message = '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $conn->real_escape_string($_POST['name']);
    $category = $conn->real_escape_string($_POST['category']);
    $quantity = (int)$_POST['quantity'];
    $location = $conn->real_escape_string($_POST['location']);
    $id       = (int)$_POST['id'];

    $sql = "UPDATE items SET name='$name', category='$category', quantity=$quantity, location='$location' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header("Location: ../public/inventory.php");
        exit;
    } else {
        $message = "Error: " . $conn->error;
    }
}

// Fetch item data
$sql = "SELECT * FROM items WHERE id = $id";
$result = $conn->query($sql);
$item = $result->fetch_assoc();
if (!$item) {
    die("Item not found.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Item - Home Inventory Tracker</title>
    <link rel="stylesheet" href="../src/add_item_style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Item</h2>
        <?php if ($message): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?= $item['id'] ?>">
            <label for="name">Item Name:</label>
            <input type="text" name="name" id="name" value="<?= htmlspecialchars($item['name']) ?>" required>

            <label for="category">Category:</label>
            <input type="text" name="category" id="category" value="<?= htmlspecialchars($item['category']) ?>" required>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" value="<?= (int)$item['quantity'] ?>" required>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" value="<?= htmlspecialchars($item['location']) ?>" required>

            <button type="submit">Save Changes</button>
        </form>
        <p><a href="inventory.php">Back to Inventory</a></p>
    </div>
</body>
</html>