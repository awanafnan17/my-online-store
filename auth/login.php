<?php
include '../includes/db.php';
include '../includes/header.php';  // Include the header for consistent layout

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../index.html");
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "No user found with that email.";
    }
}
?>

<div class="container">
    <h2>Login</h2>
    <form method="POST" action="login.php">
        <div class="form-group">
            <input type="email" name="email" placeholder="Email" class="form-control" required><br>
        </div>
        <div class="form-group">
            <input type="password" name="password" placeholder="Password" class="form-control" required><br>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

