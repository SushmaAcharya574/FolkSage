<?php
require_once "../config.php";

header("Content-Type: application/json");

$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['user_id']) || !isset($data['post_id'])) {
    echo json_encode(["error" => "User ID and Post ID required"]);
    exit;
}

$likeData = json_encode([
    "user_id" => $data['user_id'],
    "post_id" => $data['post_id']
]);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, SUPABASE_URL . "likes");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $likeData);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "apikey: " . SUPABASE_KEY,
    "Authorization: Bearer " . SUPABASE_KEY,
    "Content-Type: application/json"
]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
