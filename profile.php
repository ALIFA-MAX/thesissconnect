<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Profiles | Thesis Connect</title>
<link rel="stylesheet" href="assets/css/navbar.css">
<link rel="stylesheet" href="assets/css/profile.css">
</head>

<body>

<?php 
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])) {
    $_SESSION['error'] = 'Please login or signup to access this page';
    header('Location: homepage.php');
    exit();
}

$data = read("SELECT * FROM user_data where student_id = $_SESSION[user_id] or teacher_id = $_SESSION[user_id]");
$role = $data[0]['role'];
$dashboard_link = $role == 'student' ? 'student.php' : 'proffessor.php';
?>

<nav class="navbar">
    <div class="logo">ThesisConnect</div>
    <div class="nav-links">
        <a href="<?php echo $dashboard_link; ?>" class="nav-link">Dashboard</a>
        <a href="profile.php" class="nav-link active">Profile</a>
    </div>
    <button class="logout-btn" onclick="window.location.href='logout.php'">Logout</button>
</nav>

<div class="profile-container">
    <h1>My Profile</h1>

 <?php 
if($data[0]['role'] == 'student'){ ?>
    
<div class="grid">
    <div class="card">
        <div class="header">
            <img src="assets/images/student.svg">
            <div>
                <h2><?php echo ucwords(strtolower($data[0]['full_name'])); ?></h2>
                <p>Student</p>
            </div>
        </div>

        <div class="info">
            <p><span class="label">Full Name:</span> <?php echo $data[0]['full_name']; ?></p>
            <p><span class="label">ID:</span> <?php echo $data[0]['student_id']; ?></p>
            <p><span class="label">Department:</span> <?php echo $data[0]['department']; ?></p>
            <p><span class="label">Major:</span> <?php echo $data[0]['major']; ?></p>
            <p><span class="label">Semester:</span> <?php echo $data[0]['semester']; ?></p>
            <p><span class="label">Batch:</span> <?php echo $data[0]['batch']; ?></p>
            <p><span class="label">CGPA:</span> <?php echo $data[0]['cgpa']; ?></p>
            <p><span class="label">Group Status:</span> <?php echo $data[0]['status']; ?></p>
            <p><span class="label">Email:</span> <?php echo $data[0]['email']; ?></p>
            <p><span class="label">Phone:</span> <?php echo $data[0]['phone']; ?></p>

        </div>

        <div class="actions">
            <a href="mailto:<?php echo $data[0]['email']; ?>" class="email">Email to Join Group</a>
            <a id="stu_edit-profile" class="email" >Edit Profile</a>
        </div>
    </div>

</div>
<?php } ?>

<?php if($data[0]['role'] == 'professor'){ ?>
<div class="grid">
    <div class="card">
        <div class="header">
            <img src="assets/images/teacher.svg">
            <div>
                <h2><?php echo ucwords(strtolower($data[0]['full_name'])); ?></h2>
                <p>Professor</p>
            </div>
        </div>
        <div class="info">
            <p><span class="label">Full Name:</span> <?php echo $data[0]['full_name']; ?></p>
            <p><span class="label">ID:</span> <?php echo $data[0]['teacher_id']; ?></p>
            <p><span class="label">Department:</span> <?php echo $data[0]['department']; ?></p>
            <p><span class="label">Designation:</span> <?php echo $data[0]['designation']; ?></p>
            <p><span class="label">Research Fields:</span> <?php echo $data[0]['research_fields']; ?></p>
            <p><span class="label">Email:</span> <?php echo $data[0]['email']; ?></p>
            <p><span class="label">Phone:</span> <?php echo $data[0]['phone']; ?></p>
        </div>
        <div class="actions">
            <a href="mailto:<?php echo $data[0]['email']; ?>" class="email">Email</a>
            <button id="professor_edit_profile" class="email" type="button">Edit Profile</button>
        </div>
    </div>
</div>
<?php } ?>

</body>
<script>
if(document.getElementById('stu_edit-profile')){document.getElementById('stu_edit-profile').onclick = function() {
   // Create overlay
   let overlay = document.createElement('div');
   overlay.className = 'edit-overlay';
   overlay.onclick = function(e) { if(e.target === overlay) overlay.remove(); };

   // Create popup
   let edit = document.createElement('div');
   edit.className = 'card edit-card';
   edit.innerHTML = `
   <h2 class="edit-heading">Edit Profile</h2>
   <form id="edit-form" class="edit-form" method="POST" action="updateprofile.php">
       <label for="full_name" class="edit-label">Full Name:</label>
       <input type="text" id="full_name" name="full_name" value="<?php echo     $data[0]['full_name']; ?>" class="edit-input">

       <label for="student_id" class="edit-label">ID:</label>
       <input type="text" id="student_id" name="student_id" value="<?php echo $data[0]['student_id']; ?>" readonly class="edit-input readonly">

       <label for="department" class="edit-label">Department:</label>
       <select id="department" name="department" required class="edit-input">
           <option value="">Select Department</option>
           <option value="Computer Science" <?php if($data[0]['department']==='Computer Science') echo 'selected'; ?>>Computer Science</option>
           <option value="Electrical Engineering" <?php if($data[0]['department']==='Electrical Engineering') echo 'selected'; ?>>Electrical Engineering</option>
       </select>

       <label for="major" class="edit-label">Major:</label>
       <input type="text" id="major" name="major" value="<?php echo $data[0]['major']; ?>" class="edit-input">

       <label for="semester" class="edit-label">Semester:</label>
       <input type="text" id="semester" name="semester" value="<?php echo $data[0]['semester']; ?>" class="edit-input">

       <label for="batch" class="edit-label">Batch:</label>
       <input type="text" id="batch" name="batch" value="<?php echo $data[0]['batch']; ?>" class="edit-input">

       <label for="cgpa" class="edit-label">CGPA:</label>
       <input type="number" step="0.01" min="0" max="4" id="cgpa" name="cgpa" value="<?php echo $data[0]['cgpa']; ?>" class="edit-input">

       <label for="status" class="edit-label">Group Status:</label>
       <select id="status" name="status" class="edit-input">
           <option value="Seeking group members" <?php if($data[0]['status']==='Seeking group members') echo 'selected'; ?>>Seeking group members</option>
           <option value="Part of a thesis group" <?php if($data[0]['status']==='Part of a thesis group') echo 'selected'; ?>>Part of a thesis group</option>
           <option value="Not currently seeking" <?php if($data[0]['status']==='Not currently seeking') echo 'selected'; ?>>Not currently seeking</option>
       </select>

       <label for="email" class="edit-label">Email:</label>
       <input type="email" id="email" name="email" value="<?php echo $data[0]['email']; ?>" class="edit-input">

       <label for="phone" class="edit-label">Phone:</label>
       <input type="text" id="phone" name="phone" value="<?php echo $data[0]['phone']; ?>" class="edit-input">

       <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:18px;">
           <button type="button" class="edit-cancel-btn">Cancel</button>
           <button type="submit" class="edit-save-btn">Save Changes</button>
       </div>
   </form>
   `;
   overlay.appendChild(edit);
   document.body.appendChild(overlay);
   document.body.classList.add('modal-open');
   // Cancel button closes popup
   edit.querySelector('.edit-cancel-btn').onclick = function() {
      overlay.remove();
      document.body.classList.remove('modal-open');
   };

};
}
if(document.getElementById('professor_edit_profile')){
document.getElementById('professor_edit_profile').onclick = function() {
   let overlay = document.createElement('div');
   overlay.className = 'edit-overlay';
   overlay.onclick = function(e) { if(e.target === overlay) overlay.remove(); };
   let edit = document.createElement('div');
   edit.className = 'card edit-card';
   edit.innerHTML = `
   <h2 class="edit-heading">Edit Profile</h2>
   <form id="edit-form" class="edit-form" method="POST" action="updateprofile.php">
       <label for="full_name" class="edit-label">Full Name:</label>
       <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($data[0]['full_name']); ?>" class="edit-input">

       <label for="teacher_id" class="edit-label">ID:</label>
       <input type="text" id="teacher_id" name="teacher_id" value="<?php echo htmlspecialchars($data[0]['teacher_id']); ?>" readonly class="edit-input readonly">

       <label for="department" class="edit-label">Department:</label>
       <select id="department" name="department" required class="edit-input">
           <option value="">Select Department</option>
           <option value="Computer Science" <?php if($data[0]['department']==='Computer Science') echo 'selected'; ?>>Computer Science</option>
           <option value="Electrical Engineering" <?php if($data[0]['department']==='Electrical Engineering') echo 'selected'; ?>>Electrical Engineering</option>
       </select>

       <label for="designation" class="edit-label">Designation:</label>
       <select id="designation" name="designation" class="edit-input">
           <option value="">Select Designation</option>
           <option value="Professor" <?php if($data[0]['designation']==='Professor') echo 'selected'; ?>>Professor</option>
           <option value="Associate Professor" <?php if($data[0]['designation']==='Associate Professor') echo 'selected'; ?>>Associate Professor</option>
           <option value="Assistant Professor" <?php if($data[0]['designation']==='Assistant Professor') echo 'selected'; ?>>Assistant Professor</option>
           <option value="Lecturer" <?php if($data[0]['designation']==='Lecturer') echo 'selected'; ?>>Lecturer</option>
       </select>

       <label for="research_fields" class="edit-label">Research Fields:</label>
       <input type="text" id="research_fields" name="research_fields" value="<?php echo htmlspecialchars($data[0]['research_fields']); ?>" class="edit-input">

       <label for="email" class="edit-label">Email:</label>
       <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($data[0]['email']); ?>" class="edit-input">

       <label for="phone" class="edit-label">Phone:</label>
       <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($data[0]['phone']); ?>" class="edit-input">

       <div style="display:flex;gap:10px;justify-content:flex-end;margin-top:18px;">
           <button type="button" class="edit-cancel-btn">Cancel</button>
           <button type="submit" class="edit-save-btn">Save Changes</button>
       </div>
   </form>
   `;
   overlay.appendChild(edit);
   document.body.appendChild(overlay);
   document.body.classList.add('modal-open');
   edit.querySelector('.edit-cancel-btn').onclick = function() {
      overlay.remove();
      document.body.classList.remove('modal-open');
   };
    }}
</script>
</div>
</body>
</html>
