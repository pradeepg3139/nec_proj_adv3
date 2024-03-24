<?php
session_start();

// Check if user is already logged in
if(isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }   
        .container {
            max-width: 600px;
            margin-top: 100px;
        }
        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .jumbotron {
            background: url('https://source.unsplash.com/1600x900/?nature') center center;
            background-size: cover;
            color: white;
            text-shadow: 2px 2px 4px #000000;
        }
        .overlay {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 50px 0;
        }
        .lead {
            font-size: 1.5rem;
        }
    </style>
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container overlay text-center">
            <h1 class="display-3">Welcome to Our Website</h1>
            <p class="lead">Explore the beauty of nature with us</p>
            <p>Already a member? <a href="login.php" class="text-white">Login here</a></p>
            <p class="mt-3">Join us now for an amazing journey</p>
            <a href="register.php" class="btn btn-lg btn-primary btn-custom mt-3">Register</a>
        </div>
    </div>
</body>
</html>
