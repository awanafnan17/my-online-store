<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, description, price) VALUES ('$name', '$description', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Product added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
<form method="POST" action="add_product.php">
    <input type="text" name="name" placeholder="Product Name" required><br>
    <textarea name="description" placeholder="Product Description" required></textarea><br>
    <input type="number" name="price" placeholder="Price" required><br>
    <button type="submit">Add Product</button>
</form>
</body>
</html>
