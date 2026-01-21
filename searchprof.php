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
    if(count($results) == 0) {
        echo "<p>No supervisors found matching your criteria.</p>";
    } 
    else
    if (count($results) > 0) {
        // print_r($results);
        foreach ($results as $supervisor) {  ?>
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
        <a href="apply.php?apply=<?php echo $supervisor['teacher_id']; ?>">Request for Supervision</a> <a href="mailto:<?php echo $supervisor['email']; ?>">Mail</a>
      </div>
    </div> 
    <?php }} ?>
</body>
</html>
