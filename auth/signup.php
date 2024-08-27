<?php
include '../includes/db.php';
include '../includes/header.php';  // Include the header for consistent layout

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<div class="container">
    <h2>Signup</h2>
    <form method="POST" action="signup.php">
        <div class="form-group">
            <input type="text" name="username" placeholder="Username" class="form-control" required><br>
        </div>
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" class="form-control" required><br>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control" required><br>
        </div>
        <button type="submit" class="btn btn-primary">Signup</button>
    </form>
</div>

