<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password for security
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert into database
    $sql = "INSERT INTO users (name, email, password) 
            VALUES ('$name', '$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - African Recipe Platform</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js"></script>
</head>
<body>
    <nav>
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
    <a href="view_recipes.php">View Recipes</a>
</nav>

<header>
    <h1>Register</h1>
</header>

<div class="auth-container">

<h2>🍽 Join African Recipes</h2>

<form action="register.php" method="POST">
    <input type="text" name="username" placeholder="Username" required>

    <input type="email" name="email" placeholder="Email" required>

    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Create Account</button>
</form>

<p class="auth-note">Share your cooking passion with Africa ❤️</p>

</div>

</body>
</html>