<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Find Your Perfect Thesis Mentor</title>
<link rel="stylesheet" href="assets/css/homepage.css">
</head>

<body>
<?php
session_start();
if (isset($_SESSION['error'])) {
    echo '<script>alert("' . $_SESSION['error'] . '");</script>';
    unset($_SESSION['error']);
}
?>

<div class="home">

    <!-- Top Left -->
    <div class="top-text">
        <h1>Thesis Connect</h1>
        <p>Find your thesis mentor</p>
    </div>

    <!-- Bottom Left -->
    <div class="buttons">
        <a href="login.php" class="login-btn">Login</a>
        <a href="registration.php" class="signup-btn">Sign Up</a>
    </div>

</div>

</body>
</html>
