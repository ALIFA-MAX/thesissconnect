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
<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

body {
    background: linear-gradient(135deg, #1a2980, #26d0ce);
    min-height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.login-container {
    background: white;
    border-radius: 15px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    width: 100%;
    max-width: 1000px;
    display: flex;
    overflow: hidden;
}

.login-left {
    background: url('c:\Users\Fatima\Downloads\images (5).png') center/cover no-repeat;
    flex: 1;
    position: relative;
    display: flex;
    justify-content: center;
    align-items: center;
    color: rgb(7, 7, 106);
    padding: 20px;
}

.login-left::after {
    content: "Connect with your thesis mentor.";
    position: absolute;
    bottom: 30px;
    left: 30px;
    font-size: 1.5rem;
    font-weight: 600;
    text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.677);
}

.login-right {
    flex: 1;
    padding: 40px;
}

.login-right h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #1a2980;
}

.form-group {
    margin-bottom: 20px;
}

label {
    display: block;
    margin-bottom: 8px;
    font-weight: 600;
    color: #333;
    font-size: 15px;
}

input {
    width: 100%;
    padding: 12px 15px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    transition: border 0.3s;
}

input:focus {
    outline: none;
    border-color: #26d0ce;
    box-shadow: 0 0 0 3px rgba(38, 208, 206, 0.1);
}

.btn {
    padding: 15px 30px;
    background: #1a2980;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    width: 100%;
    transition: background 0.3s;
    margin-top: 10px;
}

.btn:hover {
    background: #26d0ce;
}

.login-link {
    text-align: center;
    margin-top: 15px;
}

.login-link a {
    color: #1a2980;
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s;
}

.login-link a:hover {
    color: #26d0ce;
}

@media (max-width: 768px) {
    .login-container {
        flex-direction: column;
    }
    .login-left {
        display: none;
    }
    .login-right {
        padding: 30px;
    }
}
</style>
</head>
<body>

<div class="login-container">
    <div class="login-left">
        <!-- Cartoon image and quote handled via CSS -->
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
                <p>Don't have an account? <a href="registration.html">Register here</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>
