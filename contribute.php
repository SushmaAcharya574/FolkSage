<!-- contribute.php - Uploading Knowledge -->
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Contribute Knowledge</title>
</head>
<body>
    <h2>Contribute Knowledge</h2>
    <form method="POST">
        <input type="text" name="title" placeholder="Title" required><br>
        <textarea name="content" placeholder="Share your knowledge" required></textarea><br>
        <select name="category">
            <option value="medicine">Traditional Medicine</option>
            <option value="agriculture">Agricultural Practices</option>
            <option value="arts">Handicrafts & Arts</option>
        </select><br>
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $category = $_POST['category'];
        $stmt = $pdo->prepare("INSERT INTO contributions (title, content, category) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $category]);
        echo "<p>Contribution submitted!</p>";
    }
    ?>
</body>
</html>
