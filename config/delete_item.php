<?php
require_once __DIR__ . '/db.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM items WHERE id = $id";
    $conn->query($sql);
}

header("Location: ../public/inventory.php");
exit;