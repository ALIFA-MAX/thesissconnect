<?php
session_start();
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];
    $_SESSION['user_id'] = $user_id;

    $query = "SELECT role FROM user_data WHERE (student_id='$user_id' OR teacher_id='$user_id') AND password='$password'";
    $result = read($query);

    if (count($result) == 1) {
        $_SESSION['role'] = $result[0]['role'];
        // print_r($result[0]);
        if($result[0]['role'] == 'student') {
            header('Location: student.php');
        } else {
            header('Location: proffessor.php');
        }
    } else {
        $_SESSION['error'] = 'Invalid ID or password. Please try again.';
        header('Location: login.php');
    }
} else {
    header('Location: login.php');
    }
?>