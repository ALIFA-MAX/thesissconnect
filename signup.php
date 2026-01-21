<?php
include 'db.php';
session_start();

// print_r($_POST);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle research_fields as comma-separated string if it's an array
    $research_fields = '';
    if (isset($_POST['research_fields'])) {
        if (is_array($_POST['research_fields'])) {
            $research_fields = implode(", ", $_POST['research_fields']);
        } else {
            $research_fields = $_POST['research_fields'];
        }
    }
    $query ="INSERT INTO `user_data`(`role`, `email`, `phone`, `department`, `student_id`, `major`, `semester`, `batch`, `cgpa`, `password`, `full_name`, `teacher_id`, `designation`, `research_fields`) VALUES ('".$_POST['role']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['department']."','".$_POST['student_id']."','".$_POST['major']."','".$_POST['semester']."','".$_POST['batch']."','".$_POST['cgpa']."','".$_POST['password']."','".$_POST['full_name']."','".$_POST['teacher_id']."','".$_POST['designation']."','".$research_fields."')";
	
    // Check if email already exists
    if(readone("SELECT * FROM user_data WHERE email='".$_POST['email']."'")){
        $_SESSION['error'] = 'Email already registered. Please use a different email.';
        header('Location: registration.php');
        exit();
    }
    
    // Check if student ID already exists (for students)
    if($_POST['role'] == 'student' && !empty($_POST['student_id'])) {
        if(readone("SELECT * FROM user_data WHERE student_id='".$_POST['student_id']."' AND role='student'")) {
            $_SESSION['error'] = 'Student ID already registered. Please use a different ID.';
            header('Location: registration.php');
            exit();
        }
    }
    
    // Check if teacher ID already exists (for professors)
    if($_POST['role'] == 'professor' && !empty($_POST['teacher_id'])) {
        if(readone("SELECT * FROM user_data WHERE teacher_id='".$_POST['teacher_id']."' AND role='professor'")) {
            $_SESSION['error'] = 'Teacher ID already registered. Please use a different ID.';
            header('Location: registration.php');
            exit();
        }
    }
    
    // If all checks pass, insert the data
    if(write($query)) {
        header('Location: login.php');
        exit();
    } else {
        $_SESSION['error'] = 'Error during registration. Please try again.';
        header('Location: registration.php');
        exit();
    }
} else {
	echo '<p>No POST data received. Submit the form from the registration page.</p>';
}
?>