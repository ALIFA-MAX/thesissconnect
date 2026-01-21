<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Professor Dashboard</title>
<link rel="stylesheet" href="assets/css/navbar.css">
<link rel="stylesheet" href="assets/css/professor.css">
</head>

<body id="body">
<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = 'Please login or signup to access this page';
    header('Location: homepage.php');
    exit();
}

if($_SESSION['role'] != 'professor') {
    $_SESSION['error'] = 'Access denied. This page is for professors only';
    header('Location: homepage.php');
    exit();
}

$teacher_id = $_SESSION['user_id'];
?>

<nav class="navbar">
    <div class="logo">ThesisConnect</div>
    <div class="nav-links">
        <a href="proffessor.php" class="nav-link active">Dashboard</a>
        <a href="profile.php" class="nav-link">Profile</a>
        <a href="assigned_students.php" class="nav-link">Assigned Students</a>
    </div>
    <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
</nav>

<div class="dashboard">

    <div class="welcome">
        <h1>Welcome, Professor 👋</h1>
        <p>Manage your thesis supervision</p>
    </div>

    <div class="cards">
        <div id="profile" class="card">
            <h3>My Profile</h3>
            <p>View academic details</p>
        </div>

        <div id="assigned-students" class="card">
            <h3>Assigned Students</h3>
            <p>View supervised students</p>
        </div>

        <div id="review-thesis" class="card">
            <h3>Review Thesis</h3>
            <p>Check proposals & reports</p>
        </div>

        <div id="notices" class="card">
            <h3>Notices</h3>
            <p>Post important announcements</p>
        </div>
    </div>

    <?php
    $query = "SELECT * FROM requests WHERE teacher_id='$teacher_id' AND status='pending'";
    $requests = read($query);
    
    if(count($requests) > 0) { ?>
    <div class="requests-section">
        <h2>Thesis Supervision Requests</h2>
        <div class="requests-list">
            <?php foreach($requests as $request) { 
                $student_query = "SELECT * FROM user_data WHERE student_id='{$request['student_id']}' AND role='student'";
                $student = read($student_query);
                if(count($student) > 0) {
                    $student = $student[0];
            ?>
            <div class="request-card">
                <div class="request-header">
                    <img src="assets/images/student.svg" alt="Student" style="width: 50px; height: 50px; border-radius: 50%;">
                    <div>
                        <h3><?php echo $student['full_name']; ?></h3>
                        <p>Student ID: <?php echo $student['student_id']; ?></p>
                    </div>
                </div>
                <div class="request-info">
                    <p><strong>Department:</strong> <?php echo $student['department']; ?></p>
                    <p><strong>Major:</strong> <?php echo $student['major']; ?></p>
                    <p><strong>Semester:</strong> <?php echo $student['semester']; ?></p>
                    <p><strong>CGPA:</strong> <?php echo $student['cgpa']; ?></p>
                    <p><strong>Email:</strong> <?php echo $student['email']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $student['phone']; ?></p>
                </div>
                <div class="request-actions">
                    <a href="accept_request.php?student_id=<?php echo $request['student_id']; ?>" class="accept-btn">Accept</a>
                    <a href="reject_request.php?student_id=<?php echo $request['student_id']; ?>" class="reject-btn">Reject</a>
                </div>
            </div>
            <?php } } ?>
        </div>
    </div>
    <?php } ?>

</div>
</body>
<script>
document.getElementById('profile').onclick = function() {
    window.location.href = 'profile.php';
};
document.getElementById('assigned-students').onclick = function() {
    window.location.href = 'assigned_students.php';
};
</script>
</html>
