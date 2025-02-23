<?php
require_once "../config.php";

header("Content-Type: application/json");

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, SUPABASE_URL . "knowledge_posts?select=id,title,content,category_id,views,created_at,user_id");
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
