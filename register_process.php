<?php
require_once 'db_connection.php';

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$file = $_FILES['file'];

// File Upload
$target_dir = "uploads/";
$target_file = $target_dir . basename($file["name"]);
move_uploaded_file($file["tmp_name"], $target_file);

// Insert user data into database
$stmt = $conn->prepare("INSERT INTO users (username, email, password, profile_image) VALUES (?, ?, ?, ?)");
if ($stmt === false) {
    die('Error preparing statement: ' . $conn->error);
}

// Bind parameters
if (!$stmt->bind_param("ssss", $username, $email, $password, $target_file)) {
    die('Error binding parameters: ' . $stmt->error);
}

// Execute statement
if (!$stmt->execute()) {
    die('Error executing statement: ' . $stmt->error);
}

// Redirect to login page
header("Location: login.php");
exit();
?>
