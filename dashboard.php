<?php
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - African Recipes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
    <a href="index.php">Home</a>
    <a href="add_recipe.php">Add Recipe</a>
    <a href="view_recipes.php">View Recipes</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="form-container">

    <h2>Welcome, <?php echo $_SESSION['user_name']; ?> 👋</h2>

    <p>You are now logged into the African Recipe Sharing Platform.</p>

    <a href="logout.php">Logout</a>

</div>

</body>
</html>