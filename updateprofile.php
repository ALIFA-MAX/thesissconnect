<?php
session_start();
include 'db.php';
if ( isset($_POST['student_id']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $major = $_POST['major'];
    $semester = $_POST['semester'];
    $batch = $_POST['batch'];
    $cgpa = $_POST['cgpa'];
    $status = $_POST['status'];
    $email = $_POST['email'];
    $student_id = $_POST['student_id'];

    print_r($_POST);
    $query = "UPDATE user_data SET full_name='$full_name', phone='$phone', department='$department', major='$major', semester='$semester', batch='$batch', cgpa='$cgpa', status='$status', email='$email', student_id='$student_id' WHERE student_id='$user_id' OR teacher_id='$user_id'";
    if(write($query)) {
        header('Location: profile.php');
        exit;
    } else {
        echo 'Error updating profile. Please try again.';
    }
} 
if(isset($_POST['teacher_id']) && $_SERVER['REQUEST_METHOD'] === 'POST'){
    $user_id = $_SESSION['user_id'];
    $full_name = $_POST['full_name'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $research_fields = $_POST['research_fields'];
    $email = $_POST['email'];
    $teacher_id = $_POST['teacher_id'];

    print_r($_POST);
    $query = "UPDATE user_data SET full_name='$full_name', phone='$phone', department='$department', designation='$designation', research_fields='$research_fields', email='$email', teacher_id='$teacher_id' WHERE student_id='$user_id' OR teacher_id='$user_id'";
    if(write($query)) {
        header('Location: profile.php');
        exit;
    } else {
        echo 'Error updating profile. Please try again.';
    }
} else {
    header('Location: profile.php');
    exit;
}
?>