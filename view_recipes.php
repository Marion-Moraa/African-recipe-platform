<?php
include "db.php";
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$sql = "SELECT * FROM recipes";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Recipes</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav>
    <a href="dashboard.php">Dashboard</a>
    <a href="add_recipe.php">Add Recipe</a>
    <a href="logout.php">Logout</a>
</nav>

<div class="page">

<h1 class="page-title">🍲 African Recipe Feed</h1>
<p class="page-subtitle">Discover recipes, stories, and cooking vibes from across Africa</p>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>

    <div class="recipe-card">

        <!-- Header like Instagram -->
        <div class="card-header">
            <div class="avatar">👩🏾‍🍳</div>
            <div>
                <h3><?php echo $row['title']; ?></h3>
                <small class="tag">Fresh recipe • Home cooked</small>
            </div>
        </div>

        <!-- Ingredients -->
        <div class="section">
            <h4>🥕 Ingredients</h4>
            <p><?php echo nl2br($row['ingredients']); ?></p>
        </div>

        <!-- Instructions -->
        <div class="section">
            <h4>🍲 How to Cook</h4>
            <p><?php echo nl2br($row['instructions']); ?></p>
        </div>

        <!-- Fun engagement bar -->
        <div class="actions">
            <span>❤️ Cooked it</span>
            <span>💬 Comment</span>
            <span>🔖 Save</span>
        </div>

        <!-- Fun message block -->
        <div class="note">
            💡 Tip: “Cooking is storytelling — every dish carries a memory.”
        </div>

    </div>

<?php
    }
} else {
    echo "<div class='empty-box'>
🎉 No recipes yet! Be the first chef in this kitchen 🍲✨<br>
<small>Share your family’s recipe and keep African food alive ❤️</small>
</div>";
}
?>

</div>

</body>
</html>