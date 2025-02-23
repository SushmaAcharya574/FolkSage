<?php
require_once "../config.php";

header("Content-Type: application/json");

$post_id = $_GET['post_id'] ?? null;

if (!$post_id) {
    echo json_encode(["error" => "Post ID required"]);
    exit;
}

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, SUPABASE_URL . "comments?post_id=eq." . $post_id);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "apikey: " . SUPABASE_KEY,
    "Authorization: Bearer " . SUPABASE_KEY,
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
