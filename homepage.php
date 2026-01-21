<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Find Your Perfect Thesis Mentor</title>
<a href="login.html" class="login-btn">Login</a>
<a href="registration.html" class="signup-btn">Sign Up</a>



<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    height: 100vh;
    background:linear-gradient(rgba(192, 190, 190, 0.4), rgba(243, 237, 237, 0.4)),
    url("PixVerse_Image_Effect_prompt_remove the writin.jpg") no-repeat center center/cover;
    color: white;
}

/* Main container */
.home {
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 50px;
}
.top-text {
    color: #0f1e5e;          
}
/* Top left text */
.top-text h1 {
    font-size: 60px;
    font-weight: bold;
    color: #0f1e5e;
}

.top-text p {
    font-size: 30px;
    margin-top: 20px;
    opacity: 0.9;
    color: #0f1e5e;
}

/* Bottom left buttons */
.buttons {
    display: flex;
    gap: 25px;
}

.buttons a {
    text-decoration: none;
    padding: 14px 28px;
    border-radius: 30px;
    font-size: 16px;
    font-weight: 600;
    transition: 0.3s;
}

/* Login button */
.login-btn {
    background: transparent;
    border: 2px solid white;
    color: rgb(52, 181, 54);
}

.login-btn:hover {
    background: white;
    color: #1a2980;
}

/* Sign up button */
.signup-btn {
    background: #26d0ce;
    color: #1a2980;
}

.signup-btn:hover {
    background: #1a2980;
    color: white;
}

/* Responsive */
@media (max-width: 768px) {
    .top-text h1 {
        font-size: 36px;
    }

    .top-text p {
        font-size: 18px;
    }
}
</style>
</head>

<body>

<div class="home">

    <!-- Top Left -->
    <div class="top-text">
        <h1>Thesis Connect</h1>
        <p>Find your thesis mentor</p>
    </div>

    <!-- Bottom Left -->
    <div class="buttons">
        <a href="login.php" class="login-btn">Login</a>
        <a href="register.php" class="signup-btn">Sign Up</a>
    </div>

</div>

</body>
</html>
