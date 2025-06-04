<?php
require_once __DIR__ . '/../config/db.php';
$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = $conn->real_escape_string($_POST['name']);
    $category = $conn->real_escape_string($_POST['category']);
    $quantity = (int)$_POST['quantity'];
    $location = $conn->real_escape_string($_POST['location']);

    $sql = "INSERT INTO items (name, category, quantity, location) VALUES ('$name', '$category', $quantity, '$location')";
    if ($conn->query($sql) === TRUE) {
        $message = "Item added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Item - Home Inventory Tracker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/add_item_style.css">
</head>
<body>
    <div class="container">
        <h2>Add New Item</h2>
        <?php if ($message): ?>
            <div class="message"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <label for="name">Item Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="category">Category:</label>
            <input type="text" name="category" id="category" required>

            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" id="quantity" min="1" value="1" required>

            <label for="location">Location:</label>
            <input type="text" name="location" id="location" required>

            <button type="submit">Add Item</button>
        </form>
        <p><a href="index.html">Back to Dashboard</a></p>
    </div>
</body>
</html>