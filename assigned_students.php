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
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Assigned Students</title>
<link rel="stylesheet" href="assets/css/navbar.css">
<link rel="stylesheet" href="assets/css/professor.css">
</head>
<body>

<nav class="navbar">
    <div class="logo">ThesisConnect</div>
    <div class="nav-links">
        <a href="proffessor.php" class="nav-link">Dashboard</a>
        <a href="profile.php" class="nav-link">Profile</a>
        <a href="assigned_students.php" class="nav-link active">Assigned Students</a>
    </div>
    <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
</nav>

<div class="dashboard">
    <div class="welcome">
        <h1>My Assigned Students</h1>
        <p>Students under your supervision</p>
    </div>

    <div class="students-list">
        <?php
        $query = "SELECT * FROM requests WHERE teacher_id='$teacher_id' AND status='accepted'";
        $requests = read($query);
        
        if(count($requests) > 0) {
            foreach($requests as $request) {
                $student_query = "SELECT * FROM user_data WHERE student_id='{$request['student_id']}' AND role='student'";
                $students = read($student_query);
                
                if(count($students) > 0) {
                    $student = $students[0];
        ?>
        <div class="student-profile-card">
            <div class="student-header">
                <img src="assets/images/student.svg" alt="Student" class="student-avatar">
                <div class="student-basic-info">
                    <h2><?php echo $student['full_name']; ?></h2>
                    <p class="student-id">Student ID: <?php echo $student['student_id']; ?></p>
                </div>
            </div>
            
            <div class="student-details">
                <div class="detail-row">
                    <span class="label">Department:</span>
                    <span class="value"><?php echo $student['department']; ?></span>
                </div>
                <div class="detail-row">
                    <span class="label">Major:</span>
                    <span class="value"><?php echo $student['major']; ?></span>
                </div>
                <div class="detail-row">
                    <span class="label">Semester:</span>
                    <span class="value"><?php echo $student['semester']; ?></span>
                </div>
                <div class="detail-row">
                    <span class="label">Batch:</span>
                    <span class="value"><?php echo $student['batch']; ?></span>
                </div>
                <div class="detail-row">
                    <span class="label">CGPA:</span>
                    <span class="value"><?php echo $student['cgpa']; ?></span>
                </div>
                <div class="detail-row">
                    <span class="label">Email:</span>
                    <span class="value"><?php echo $student['email']; ?></span>
                </div>
                <div class="detail-row">
                    <span class="label">Phone:</span>
                    <span class="value"><?php echo $student['phone']; ?></span>
                </div>
            </div>
            
            <div class="student-actions">
                <a href="mailto:<?php echo $student['email']; ?>" class="action-btn email-btn">Send Email</a>
                <a href="view_student_thesis.php?student_id=<?php echo $student['student_id']; ?>" class="action-btn thesis-btn">View Thesis</a>
            </div>
        </div>
        <?php
                }
            }
        } else {
            echo "<p class='no-students'>No students assigned yet.</p>";
        }
        ?>
    </div>
</div>

</body>
</html>
