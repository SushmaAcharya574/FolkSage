<!-- forum.php - Community Forum -->
<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Community Forum</title>
</head>
<body>
    <h2>Community Discussions</h2>
    <form method="POST">
        <input type="text" name="user" placeholder="Your Name" required><br>
        <textarea name="message" placeholder="Share your thoughts" required></textarea><br>
        <button type="submit" name="post">Post</button>
    </form>
    <?php
    if (isset($_POST['post'])) {
        $user = $_POST['user'];
        $message = $_POST['message'];
        $stmt = $pdo->prepare("INSERT INTO forum (user, message) VALUES (?, ?)");
        $stmt->execute([$user, $message]);
    }
    $stmt = $pdo->query("SELECT * FROM forum ORDER BY created_at DESC");
    while ($row = $stmt->fetch()) {
        echo "<p><strong>{$row['user']}</strong>: {$row['message']}</p>";
    }
    ?>
</body>
</html>