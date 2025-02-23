<?php
require_once "config.php";

header("Content-Type: application/json");

// Get JSON input from request
$data = json_decode(file_get_contents("php://input"), true);

// Validate input
if (!isset($data['user_id']) || !isset($data['title']) || !isset($data['content'])) {
    echo json_encode(["error" => "Missing required fields"]);
    exit;
}

// Prepare JSON payload
$postData = json_encode([
    "user_id" => $data['user_id'],
    "title" => $data['title'],
    "content" => $data['content']
]);

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, SUPABASE_URL . "knowledge_posts");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
curl_setopt($ch, CURLOPT_HTTPHEADER, HEADERS);

$response = curl_exec($ch);
curl_close($ch);

echo $response; // Output JSON response
?>
