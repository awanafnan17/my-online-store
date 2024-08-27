<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $sql_product = "SELECT price FROM products WHERE id='$product_id'";
    $result_product = $conn->query($sql_product);
    $product = $result_product->fetch_assoc();

    $total_price = $product['price'] * $quantity;

    $sql = "INSERT INTO orders (user_id, product_id, quantity, total_price) VALUES ('$user_id', '$product_id', '$quantity', '$total_price')";

    if ($conn->query($sql) === TRUE) {
        echo "Order placed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
