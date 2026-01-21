<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Assigned Supervisor | Thesis Connect</title>
<link rel="stylesheet" href="assets/css/navbar.css">
<link rel="stylesheet" href="assets/css/searchprof.css">
<link rel="stylesheet" href="assets/css/profile.css">
</head>
<body>

<nav class="navbar">
  <div class="logo">ThesisConnect</div>
  <div class="nav-links">
    <a href="student.php" class="nav-link">Dashboard</a>
    <a href="profile.php" class="nav-link">Profile</a>
    <a href="assigned_supervisor.php" class="nav-link active">Assigned Supervisor</a>
  </div>
  <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
</nav>

<div class="results-container">
  <h1>Assigned Supervisor</h1>
  
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
  
  // Get the student's assigned supervisor ID
  $student_id =  $_SESSION['user_id'];
  $query = "SELECT * FROM requests WHERE student_id='$student_id' and status='accepted'";
  $student_data = read($query);
  
  if (!empty($student_data) && !empty($student_data[0]['teacher_id'])) {
      $supervisor_id = $student_data[0]['teacher_id'];
      
      // Fetch supervisor details
      $supervisor_query = "SELECT * FROM user_data WHERE teacher_id='$supervisor_id' AND role='professor'";
      $supervisor = read($supervisor_query);
      
      if (!empty($supervisor)) {
          $sup = $supervisor[0];
  ?>
  
  <div class="grid">
    <div class="card">
      <div class="header">
        <img src="assets/images/teacher.svg" alt="Supervisor">
        <div>
          <h2><?php echo  ($sup['full_name']); ?></h2>
          <p>Thesis Supervisor</p>
        </div>
      </div>

      <div class="info">
        <p><span class="label">Faculty ID:</span> <?php echo ($sup['teacher_id']); ?></p>
        <p><span class="label">Department:</span> <?php echo ($sup['department']); ?></p>
        <p><span class="label">Designation:</span> <?php echo ($sup['designation']); ?></p>
        <p><span class="label">Research Fields:</span> <?php echo  ($sup['research_fields']); ?></p>
        <p><span class="label">Email:</span> <?php echo  ($sup['email']); ?></p>
        <p><span class="label">Phone:</span> <?php echo  ($sup['phone']); ?></p>
      </div>

      <div class="actions">
        <a href="mailto:<?php echo  ($sup['email']); ?>" class="email">Send Email</a>
      </div>
    </div>
  </div>
  
  <?php 
      } else {
          echo '<p style="text-align:center; margin-top:50px; font-size:18px; color:#666;">Supervisor information not found.</p>';
      }
  } else {
      echo '<p style="text-align:center; margin-top:50px; font-size:18px; color:#666;">No supervisor has been assigned to you yet.</p>';
      echo '<p style="text-align:center; margin-top:20px;"><a href="searchprof.php?search=0" style="color:#1a2980; font-weight:600;">Search for a supervisor</a></p>';
  }
  ?>
  
</div>

</body>
</html>
