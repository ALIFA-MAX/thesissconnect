<?php 
session_start();
include 'db.php';
if(isset($_GET['apply'])){
    $student_id = $_SESSION['user_id'];
    $teacher_id = $_GET['apply'];
    
    // Check if request already exists for this professor
    $existing_request_query = "SELECT * FROM requests WHERE student_id='$student_id' AND teacher_id='$teacher_id'";
    $existing_request = read($existing_request_query);
    
    if(count($existing_request) > 0) {
        $status = $existing_request[0]['status'];
        
        if($status == 'pending') {
            echo "<script>alert('You have already sent a request to this professor. Please wait for approval.'); window.location.href='searchprof.php?search=0';</script>";
            exit;
        } elseif($status == 'rejected') {
            echo "<script>alert('Your previous request to this professor was rejected. You cannot send another request.'); window.location.href='searchprof.php?search=0';</script>";
            exit;
        } elseif($status == 'accepted') {
            echo "<script>alert('This professor has already accepted your request.'); window.location.href='assigned_supervisor.php';</script>";
            exit;
        }
    }
    
    // Check total pending requests
    $pending_count_query = "SELECT COUNT(*) as count FROM requests WHERE student_id='$student_id' AND status='pending'";
    $pending_result = read($pending_count_query);
    $pending_count = $pending_result[0]['count'];
    
    if($pending_count >= 3) {
        echo "<script>alert('You can only have 3 pending requests at a time. Please wait for responses or cancel existing requests.'); window.location.href='searchprof.php?search=0';</script>";
        exit;
    }
    
    // If all checks pass, insert the request
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