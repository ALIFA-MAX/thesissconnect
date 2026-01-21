<?php 
session_start();
include 'db.php';
if(isset($_GET['apply'])){
    $student_id = $_SESSION['user_id'];
    $teacher_id = $_GET['apply'];
    $query = "INSERT INTO requests (student_id, teacher_id, status) VALUES ('$student_id', '$teacher_id', 'pending')";
    if(write($query)) {
        echo "<script>alert('Supervision request sent successfully.'); window.location.href='student.php';</script>";
    } else {
        echo "<script>alert('Error sending supervision request. Please try again.'); window.location.href='student.php';</script>";
    }
} else {
    header('Location: student.php');
    exit;
}
?>