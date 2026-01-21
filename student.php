<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student Dashboard</title>
<link rel="stylesheet" href="assets/css/navbar.css">
<link rel="stylesheet" href="assets/css/student.css">
</head>

<body>
<?php
session_start();

if(!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = 'Please login or signup to access this page';
    header('Location: homepage.php');
    exit();
}

if($_SESSION['role'] != 'student') {
    $_SESSION['error'] = 'Access denied. This page is for students only';
    header('Location: homepage.php');
    exit();
}
?>

<nav class="navbar">
    <div class="logo">ThesisConnect</div>
    <div class="nav-links">
        <a href="student.php" class="nav-link active">Dashboard</a>
        <a href="profile.php" class="nav-link">Profile</a>
    </div>
    <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
</nav>

<div class="dashboard">

    <div class="welcome">
        <h1>Welcome, Student 👋</h1>
        <p>Manage your thesis activities</p>
    </div>

    <div  class="cards">
        <div id="profile" class="card">
            <h3>My Profile</h3>
            <p>View your personal & academic info</p>
        </div>

        <div id="assigned-supervisor" class="card">
            <h3>Assigned Supervisor</h3>
            <p>View thesis mentor details</p>
        </div>

        <div id="thesis-progress" class="card">
            <h3>Thesis Progress</h3>
            <p>Track proposal & report status</p>
        </div>

        <div id="submit-thesis" class="card">
            <h3>Submit Thesis</h3>
            <p>Upload documents & files</p>
        </div>
    </div>

    <div class="search-supervisor">
        <h2>Search Supervisor</h2>
        <form method="GET" action="searchprof.php" style="display:flex; flex-direction:column; gap:18px;">
            <div>
                <label for="search_name">By Name:</label>
                <input type="text" id="search_name" name="search_name" placeholder="Enter supervisor name">
            </div>
            <div>
                <label for="search_research_fields">By Research Fields:</label>
                <select id="search_research_fields" name="search_research_fields">
                    <option value="">Select Research Field</option>
                    <option value="Artificial Intelligence">Artificial Intelligence</option>
                    <option value="Data Science">Data Science</option>
                    <option value="Machine Learning">Machine Learning</option>
                    <option value="Cybersecurity">Cybersecurity</option>
                    <option value="Software Engineering">Software Engineering</option>
                    <option value="Networks">Networks</option>
                    <option value="Robotics">Robotics</option>
                    <option value="IoT">Internet of Things</option>
                    <option value="Cloud Computing">Cloud Computing</option>
                </select>
            </div>
            <button type="submit">Search</button>
        </form>
    </div>

</div>

</body>
<script>
document.getElementById('profile').onclick = function() {
    window.location.href = 'profile.php';
};
document.getElementById('assigned-supervisor').onclick = function() {
    window.location.href = 'assigned_supervisor.php';
};
document.getElementById('thesis-progress').onclick = function() {
    window.location.href = 'thesis_progress.php';
};
document.getElementById('submit-thesis').onclick = function() {
    window.location.href = 'submit_thesis.php';
};
</script>
</html>
