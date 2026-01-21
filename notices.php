<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Notices | Thesis Connect</title>
<link rel="stylesheet" href="assets/css/navbar.css">
<link rel="stylesheet" href="assets/css/notices.css">
</head>
<body>

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

// Fetch all notices for this teacher
$notices_query = "SELECT * FROM notice WHERE teacher_id='$teacher_id' ORDER BY id DESC";
$notices = read($notices_query);
?>

<nav class="navbar">
    <div class="logo">ThesisConnect</div>
    <div class="nav-links">
        <a href="proffessor.php" class="nav-link">Dashboard</a>
        <a href="profile.php" class="nav-link">Profile</a>
        <a href="assigned_students.php" class="nav-link">Assigned Students</a>
        <a href="notices.php" class="nav-link active">Notices</a>
    </div>
    <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
</nav>

<div class="notices-container">
    <h1>Notice Board</h1>
    
    <?php
    if(isset($_SESSION['success'])) {
        echo '<div class="message success">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']);
    }
    if(isset($_SESSION['error'])) {
        echo '<div class="message error">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
    ?>
    
    <!-- Create New Notice Section -->
    <div class="create-notice-section">
        <h2>Create New Notice</h2>
        <form method="POST" action="create_notice.php" class="notice-form">
            <textarea name="notice" placeholder="Enter your notice here..." required></textarea>
            <button type="submit" class="create-btn">Post Notice</button>
        </form>
    </div>

    <!-- Previous Notices Section -->
    <div class="notices-list-section">
        <h2>Previous Notices</h2>
        
        <?php if(count($notices) > 0) { ?>
            <div class="notices-list">
                <?php foreach($notices as $notice) { ?>
                <div class="notice-card">
                    <div class="notice-content">
                        <p><?php echo htmlspecialchars($notice['notice']); ?></p>
                    </div>
                </div>
                <?php } ?>
            </div>
        <?php } else { ?>
            <div class="no-notices">
                <p>No notices posted yet. Create your first notice above!</p>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>
