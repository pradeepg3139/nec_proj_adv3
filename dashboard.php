<?php
session_start();
require_once 'db_connection.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];

// Retrieve user data from database
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

// Display user's profile image
$profile_image = $user['profile_image'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            max-width: 800px;
            margin-top: 50px;
        }
        .profile-image {
            max-width: 200px;
            border-radius: 50%;
            margin-bottom: 20px;
        }
        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container text-center">
        <h2 class="mb-4">Welcome, <?php echo $_SESSION['username']; ?></h2>
        <?php if (!empty($profile_image)): ?>
            <img src="<?php echo $profile_image; ?>" alt="Profile Image" class="profile-image">
        <?php endif; ?>
        <div class="mt-4">
            <a href="logout.php" class="btn btn-lg btn-primary btn-custom">Logout</a>
        </div>
    </div>
</body>
</html>
