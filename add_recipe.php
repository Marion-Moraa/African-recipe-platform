<?php
include "db.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_id = $_SESSION['user_id'];
    $title = $_POST['title'];
    $ingredients = $_POST['ingredients'];
    $instructions = $_POST['instructions'];

    $sql = "INSERT INTO recipes (user_id, title, ingredients, instructions)
            VALUES ('$user_id', '$title', '$ingredients', '$instructions')";

    if ($conn->query($sql) === TRUE) {
        echo "Recipe added successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
// Protect page (only logged-in users)
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Recipe</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="view_recipes.php">View Recipes</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="form-container">

<h2>Add New Recipe</h2>

<form action="add_recipe.php" method="POST">

    <label>Recipe Title:</label><br>
    <input type="text" name="title" required><br><br>

    <label>Ingredients:</label><br>
    <textarea name="ingredients" required></textarea><br><br>

    <label>Instructions:</label><br>
    <textarea name="instructions" required></textarea><br><br>

    <button type="submit">Add Recipe</button>

</form>

</div>

</body>
</html>