<?php error_reporting(E_ALL);
ini_set('display_errors', 1); ?>
<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();

        // verify password
        if (password_verify($password, $row['password'])) {

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];

            header("Location: dashboard.php");
            exit();
        } else {
            echo "Wrong password!";
        }

    } else {
        echo "User not found!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - African Recipes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
    <a href="index.php">Home</a>
    <a href="register.php">Register</a>
    <a href="view_recipes.php">View Recipes</a>
</nav>

<div class="auth-container">

<h2>🍲 Welcome Back</h2>

<form action="login.php" method="POST">
    <input type="text" name="username" placeholder="Username" required>

    <input type="password" name="password" placeholder="Password" required>

    <button type="submit">Login</button>
</form>

<p class="auth-note">Cook. Share. Enjoy African Food ❤️</p>

</div>

</body>
</html>