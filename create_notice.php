<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id']) || $_SESSION['role'] != 'professor') {
    header('Location: login.php');
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['notice'])) {
    $teacher_id = $_SESSION['user_id'];
    $notice = $_POST['notice'];
    
    $query = "INSERT INTO notice (teacher_id, notice) VALUES ('$teacher_id', '$notice')";
    
    if(write($query)) {
        $_SESSION['success'] = 'Notice posted successfully.';
    } else {
        $_SESSION['error'] = 'Error posting notice. Please try again.';
    }
}

header('Location: notices.php');
exit();
?>
