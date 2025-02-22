<!-- repository.php - Displaying Knowledge Repository -->
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Knowledge Repository</title>
</head>
<body>
    <h2>Knowledge Repository</h2>
    <ul>
        <li><a href='repository.php?category=medicine'>Traditional Medicine</a></li>
        <li><a href='repository.php?category=agriculture'>Agricultural Practices</a></li>
        <li><a href='repository.php?category=arts'>Handicrafts & Arts</a></li>
    </ul>
    <?php
    if (isset($_GET['category'])) {
        $category = $_GET['category'];
        $stmt = $pdo->prepare("SELECT * FROM contributions WHERE category = ?");
        $stmt->execute([$category]);
        while ($row = $stmt->fetch()) {
            echo "<div><h3>{$row['title']}</h3><p>{$row['content']}</p></div>";
        }
    }
    ?>
</body>
</html>