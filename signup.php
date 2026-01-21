<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query ="INSERT INTO `user_data`(`role`, `email`, `phone`, `department`, `student_id`, `major`, `semester`, `batch`, `cgpa`, `password`, `full_name`, `teacher_id`, `designation`, `research_fields`) VALUES ('".$_POST['role']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['department']."','".$_POST['student_id']."','".$_POST['major']."','".$_POST['semester']."','".$_POST['batch']."','".$_POST['cgpa']."','".$_POST['password']."','".$_POST['full_name']."','".$_POST['teacher_id']."','".$_POST['designation']."','".$_POST['research_fields']."')";
	if(readone("SELECT * FROM user_data WHERE email='".$_POST['email']."'")){
        $_SESSION['error'] = 'Email already registered. Please use a different email.';
        header('Location: registration.php');
    }
    else{
        if(write($query)) {
        header('Location: login.html');
    } else {
        $_SESSION['error'] = 'Error during registration. Please try again.';
    }
    }
} else {
	echo '<p>No POST data received. Submit the form from the registration page.</p>';
}
?>