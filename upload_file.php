<?php
require_once "../config.php";

if ($_FILES['file']['error'] === UPLOAD_ERR_OK) {
    $file_tmp = $_FILES['file']['tmp_name'];
    $file_name = $_FILES['file']['name'];

    $upload_path = "uploads/" . $file_name; // Store in uploads folder

    if (move_uploaded_file($file_tmp, $upload_path)) {
        echo json_encode(["success" => "File uploaded successfully!", "file_url" => $upload_path]);
    } else {
        echo json_encode(["error" => "Failed to upload file"]);
    }
} else {
    echo json_encode(["error" => "No file uploaded"]);
}
?>
