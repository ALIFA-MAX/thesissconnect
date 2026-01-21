<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'professor') {
    header('Location: login.php');
    exit();
}

if(isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];
    $teacher_id = $_SESSION['user_id'];
    
    // Update request status to accepted
    $update_request = "UPDATE requests SET status='accepted' WHERE student_id='$student_id' AND teacher_id='$teacher_id'";
    write($update_request);
    
    header('Location: proffessor.php');
    exit();
}
?>
