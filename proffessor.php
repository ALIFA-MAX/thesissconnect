<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Professor Dashboard</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI, Tahoma, sans-serif;
}

body{
    background:#f5f7fa;
}

/* Navbar */
.navbar{
    background:#26d0ce;
    color:#1a2980;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.navbar h2{
    font-size:22px;
}

/* Dashboard */
.dashboard{
    padding:30px;
}

.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(220px,1fr));
    gap:20px;
}

.card{
    background:white;
    padding:25px;
    border-radius:12px;
    box-shadow:0 10px 20px rgba(0,0,0,0.1);
}

.card h3{
    color:#1a2980;
    margin-bottom:10px;
}

.card p{
    font-size:16px;
}

.welcome{
    margin-bottom:30px;
}
</style>
</head>

<body>

<div class="navbar">
    <h2>Professor Dashboard</h2>
    <p>ID: <?php echo $_SESSION['user_id']; ?></p>
</div>

<div class="dashboard">

    <div class="welcome">
        <h1>Welcome, Professor 👋</h1>
        <p>Manage your thesis supervision</p>
    </div>

    <div class="cards">
        <div class="card">
            <h3>My Profile</h3>
            <p>View academic details</p>
        </div>

        <div class="card">
            <h3>Assigned Students</h3>
            <p>View supervised students</p>
        </div>

        <div class="card">
            <h3>Review Thesis</h3>
            <p>Check proposals & reports</p>
        </div>

        <div class="card">
            <h3>Notices</h3>
            <p>Post important announcements</p>
        </div>
    </div>

</div>

</body>
</html>
