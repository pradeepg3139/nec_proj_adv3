<?php
session_start();
require_once 'db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];

// Retrieve user data from database
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Verify password
if ($user && password_verify($password, $user['password'])) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['user_id'] = $user['id'];
    
    // Redirect to dashboard
    header("Location: dashboard.php");
    exit();
} else {
    $_SESSION['error'] = "Invalid username or password";
    header("Location: login.php");
    exit();
}
?>
