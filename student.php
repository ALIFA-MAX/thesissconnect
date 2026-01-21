<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Dashboard</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Segoe UI, Tahoma, sans-serif;
}

body{
    background:#f2f6fc;
}

/* Navbar */
.navbar{
    background:#1a2980;
    color:white;
    padding:15px 30px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.navbar h2{
    font-size:22px;
}

/* Dashboard container */
.dashboard{
    padding:30px;
}

/* Cards */
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

/* Welcome */
.welcome{
    margin-bottom:30px;
}
</style>
</head>

<body>

<div class="navbar">
    <h2>Student Dashboard</h2>
    <p>23-50169-1</p>
</div>

<div class="dashboard">

    <div class="welcome">
        <h1>Welcome, Student 👋</h1>
        <p>Manage your thesis activities</p>
    </div>

    <div class="cards">
        <div class="card">
            <h3>My Profile</h3>
            <p>View your personal & academic info</p>
        </div>

        <div class="card">
            <h3>Assigned Supervisor</h3>
            <p>View thesis mentor details</p>
        </div>

        <div class="card">
            <h3>Thesis Progress</h3>
            <p>Track proposal & report status</p>
        </div>

        <div class="card">
            <h3>Submit Thesis</h3>
            <p>Upload documents & files</p>
        </div>
    </div>

</div>

</body>
</html>
