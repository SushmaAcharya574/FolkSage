

<!-- index.php - Homepage -->
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Indigenous Knowledge Platform</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Preserving Indigenous Knowledge</h1>
        <nav>
            <a href="index.php">Home</a>
            <a href="repository.php">Knowledge Repository</a>
            <a href="contribute.php">Contribute</a>
            <a href="forum.php">Community Forum</a>
        </nav>
    </header>
    <section>
        <h2>Featured Knowledge</h2>
        <!-- Fetch featured contributions from DB -->
        <?php
        $stmt = $pdo->query("SELECT * FROM contributions ORDER BY created_at DESC LIMIT 5");
        while ($row = $stmt->fetch()) {
            echo "<div class='post'><h3>{$row['title']}</h3><p>{$row['content']}</p></div>";
        }
        ?>
    </section>
</body>
</html>





