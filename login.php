<?php
session_start();
if (isset($_SESSION['error'])) {
    echo '<script>alert("' . $_SESSION['error'] . '");</script>';
    unset($_SESSION['error']);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - ThesisConnect</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/login.css">
</head>
<body>

<div class="login-container">
    <div class="login-left">
        <div class="illustration-wrapper">
            <img src="assets/images/login-illustration.svg" alt="Thesis Connect Illustration" class="login-illustration">
        </div>
        <h1>Connect with your thesis mentor.</h1>
    </div>
    
    <div class="login-right">
        <h2>Welcome Back!</h2>
        <form method="POST" action="logincheck.php">
            <div class="form-group">
                <label for="user_id">ID:</label>
                <input type="text" id="user_id" name="user_id" placeholder="Enter your ID" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
            </div>

            <button type="submit" class="btn">Login</button>

            <div class="login-link">
                <p><a href="#">Forgot Password?</a></p>
                <p>Don't have an account? <a href="registration.php">Register here</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>
