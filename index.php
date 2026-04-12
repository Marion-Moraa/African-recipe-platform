<?php include("db.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>African Recipe Sharing Platform</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="navbar">
    <h1>🍲 African Recipes</h1>
</header>

<nav class="nav">
    <a href="index.php">Home</a>
    <a href="login.php">Login</a>
    <a href="register.php">Register</a>
    <a href="view_recipes.php">Explore Recipes</a>
</nav>

<<div class="hero">
    <h1>🍲 African Recipe Sharing Platform</h1>
    <p>Discover stories, flavors & traditions from African kitchens ❤️</p>
</div>

<div class="cta">
    <a href="view_recipes.php">📖 Explore Recipes</a>
    <a href="add_recipe.php">➕ Share Your Recipe</a>
</div>

<h2 class="section-title">🔥 Trending Food Stories</h2>

<div class="recipe-grid">

<?php
$result = $conn->query("SELECT * FROM recipes ORDER BY id DESC");

while($row = $result->fetch_assoc()) {
?>

<div class="card">
     <h3>🍲 <?php echo $row['title']; ?></h3>

    <div class="preview">
        🌍 <?php
        $stories = [
            "A beloved African dish passed through generations ❤️",
            "A street favorite full of bold flavors 🔥",
            "A family recipe enjoyed during celebrations 🎉",
            "A comforting dish that brings people together 🍛"
        ];
        echo $stories[array_rand($stories)];
        ?>
    </div>

    <div class="note">
        💡 Tip: <?php echo substr($row['ingredients'], 0, 60); ?>...
    </div>

    <button>👀 Cook It</button>

</div>


<?php } ?>

</div>

</body>
</html>