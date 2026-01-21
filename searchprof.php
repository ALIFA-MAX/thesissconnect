<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Supervisor Search Results</title>
<link rel="stylesheet" href="assets/css/navbar.css">
<link rel="stylesheet" href="assets/css/searchprof.css">
</head>
<body>
<nav class="navbar">
  <div class="logo">ThesisConnect</div>
  <div class="nav-links">
    <a href="student.php" class="nav-link">Dashboard</a>
    <a href="profile.php" class="nav-link">Profile</a>
  </div>
  <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
</nav>
<div class="results-container">
  <div class="results-title">Supervisor Search Results</div>
  <div class="supervisor-list">
    <?php 
    session_start();
    include 'db.php';

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

    if(isset($_GET['search']) && $_GET['search'] == 0) {
        $query = "SELECT * FROM user_data WHERE role='professor';";
    }
    else {
        $search_research_fields = isset($_GET['search_research_fields']) ? trim($_GET['search_research_fields']) : '';
        $name = isset($_GET['search_name']) ? trim($_GET['search_name']) : '';
    }
    if (empty($search_research_fields) && empty($name)) {
        echo "<p>Please enter a name or select a research field to search for supervisors.</p>";
        exit();
    }
    else if (!empty($search_research_fields) && !empty($name)) {
        $query = "SELECT * FROM user_data WHERE role='professor' AND research_fields LIKE '%$search_research_fields%' AND full_name LIKE '%$name%'";
    } 
    else if (!empty($search_research_fields)) {
        $query = "SELECT * FROM user_data WHERE role='professor' AND research_fields LIKE '%$search_research_fields%'";
    } 
    else {
        $query = "SELECT * FROM user_data WHERE role='professor' AND full_name LIKE '%$name%'";
    }
   
    $results = read($query);
    
    // Get student's existing requests
    $student_id = $_SESSION['user_id'];
    $student_requests_query = "SELECT teacher_id, status FROM requests WHERE student_id='$student_id'";
    $student_requests = read($student_requests_query);
    $requests_map = [];
    foreach($student_requests as $req) {
        $requests_map[$req['teacher_id']] = $req['status'];
    }
    
    if(count($results) == 0) {
        echo "<p>No supervisors found matching your criteria.</p>";
    } 
    else
    if (count($results) > 0) {
        // print_r($results);
        foreach ($results as $supervisor) {
            $teacher_id = $supervisor['teacher_id'];
            $request_status = isset($requests_map[$teacher_id]) ? $requests_map[$teacher_id] : null;
            $button_html = '';
            
            if($request_status == 'pending') {
                $button_html = '<span class="request-status pending">Request Pending</span>';
            } elseif($request_status == 'accepted') {
                $button_html = '<span class="request-status accepted">Request Accepted</span>';
            } elseif($request_status == 'rejected') {
                $button_html = '<span class="request-status rejected">Request Rejected</span>';
            } else {
                $button_html = '<a href="apply.php?apply=' . $teacher_id . '">Request for Supervision</a>';
            }
        ?>
    <div class="supervisor-card">
      <img src="assets/images/teacher.svg" class="supervisor-img">
      <div class="supervisor-info">
        <h3><?php echo $supervisor['full_name']; ?></h3>
        <p><strong>ID:</strong><?php echo $supervisor['teacher_id']; ?></p>
        <p><strong>Department:</strong> <?php echo $supervisor['department']; ?></p>
        <p><strong>Designation:</strong><?php echo $supervisor['designation']; ?></p>
        <p><strong>Research Fields:</strong> <?php echo $supervisor['research_fields']; ?></p>
        <p><strong>Email:</strong> <?php echo $supervisor['email']; ?></p>
        <p><strong>Phone:</strong> <?php echo $supervisor['phone']; ?></p>
        <?php echo $button_html; ?> <a href="mailto:<?php echo $supervisor['email']; ?>">Mail</a>
      </div>
    </div> 
    <?php }} ?>
</body>
</html>
