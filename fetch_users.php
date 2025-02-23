
<?php
require_once "config.php"; // Import Supabase API details

header("Content-Type: application/json");

// Initialize cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, SUPABASE_URL . "users"); // Fetch from users table
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, HEADERS);

$response = curl_exec($ch);
curl_close($ch);

echo $response; // Output JSON response
?>
