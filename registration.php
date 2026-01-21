<?php
session_start();
if (isset($_SESSION['error'])) {
    echo '<script>alert("' . $_SESSION['error'] . '");</script>';
    unset($_SESSION['error']);
}

?>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - ThesisConnect</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/css/registration.css">
</head>
<body>
<div class="register-container">
    <div class="register-header">
        <h1>📝 Create Account</h1>
        <p>Register as Student or Professor</p>
    </div>
    
    <div class="register-body">
        <form method="POST" action="signup.php">
            <!-- Role Selection -->
            <div class="form-group">
                <label for="role">I am a:</label>
                <select id="role" name="role" required onchange="toggleRoleFields()">
                    <option value="">Select your role</option>
                    <option value="student">Student</option>
                    <option value="professor">Professor</option>
                </select>
            </div>
            
            <!-- Basic Information -->
            <div class="form-row">
                <div class="form-group">
                    <label for="full_name">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" required>
                </div>
                
                <div class="form-group">
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" placeholder="example@email.com" required>
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="01XXXXXXXXX" required>
                </div>
                
                <div class="form-group">
                    <label for="department">Department:</label>
                    <select id="department" name="department" required>
                        <option value="">Select Department</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Electrical Engineering">Electrical Engineering</option>
                    </select>
                </div>
            </div>
            
            <!-- Student Fields -->
            <div id="studentFields" class="role-fields" style="display:none;">
                <h4>🎓 Student Information</h4>
                <div class="form-group">
                    <label for="student_id">Student ID:</label>
                    <input type="text" id="student_id" name="student_id" placeholder="Format: XX-XXXXX-X">
                    <div class="id-format">Example: 23-51001-1</div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="major">Major/Subject:</label>
                        <input type="text" id="major" name="major" placeholder="e.g., Computer Science">
                    </div>
                    <div class="form-group">
                        <label for="semester">Semester:</label>
                        <select id="semester" name="semester">
                            <option value="">Select Semester</option>
                            <option value="1">1st Semester</option>
                            <option value="2">2nd Semester</option>
                            <option value="3">3rd Semester</option>
                            <option value="4">4th Semester</option>
                            <option value="5">5th Semester</option>
                            <option value="6">6th Semester</option>
                            <option value="7">7th Semester</option>
                            <option value="8">8th Semester</option>
                            <option value="9">9th Semester</option>
                            <option value="10">10th Semester</option>
                            <option value="11">11th Semester</option>
                            <option value="12">12th Semester</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="batch">Batch Year:</label>
                        <select id="batch" name="batch">
                            <option value="">Select Batch</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>
                            <option value="2023">2023</option>
                            <option value="2024">2024</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cgpa">CGPA:</label>
                        <input type="number" id="cgpa" name="cgpa" step="0.01" min="0" max="4" placeholder="e.g., 3.75">
                    </div>
                </div>
            </div>
            
            <!-- Professor Fields -->
            <div id="professorFields" class="role-fields" style="display:none;">
                <h4>👨‍🏫 Professor Information</h4>
                <div class="form-group">
                    <label for="teacher_id">Professor ID:</label>
                    <input type="text" id="teacher_id" name="teacher_id" placeholder="6 digits (e.g., 202401)">
                    <div class="id-format">Must be exactly 6 digits</div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="designation">Designation:</label>
                        <select id="designation" name="designation">
                            <option value="">Select Designation</option>
                            <option value="Professor">Professor</option>
                            <option value="Associate Professor">Associate Professor</option>
                            <option value="Assistant Professor">Assistant Professor</option>
                            <option value="Lecturer">Lecturer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Research Fields:</label>
                        <div class="checkbox-group">
                          <label><input type="checkbox" name="research_fields[]" value="Artificial Intelligence"> Artificial Intelligence</label>
                          <label><input type="checkbox" name="research_fields[]" value="Data Science"> Data Science</label>
                          <label><input type="checkbox" name="research_fields[]" value="Machine Learning"> Machine Learning</label>
                          <label><input type="checkbox" name="research_fields[]" value="Cybersecurity"> Cybersecurity</label>
                          <label><input type="checkbox" name="research_fields[]" value="Software Engineering"> Software Engineering</label>
                          <label><input type="checkbox" name="research_fields[]" value="Networks"> Networks</label>
                          <label><input type="checkbox" name="research_fields[]" value="Robotics"> Robotics</label>
                          <label><input type="checkbox" name="research_fields[]" value="IoT"> Internet of Things</label>
                          <label><input type="checkbox" name="research_fields[]" value="Cloud Computing"> Cloud Computing</label>
                          <label><input type="checkbox" name="research_fields[]" value="Other"> Other</label>
                        </div>
                        <div class="id-format">Select all applicable research fields.</div>
                    </div>
                </div>
            </div>
            
            <!-- Password -->
            <div class="form-row">
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Minimum 6 characters" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Re-enter password" required>
                </div>
            </div>
            
            <button type="submit" name="submit" class="btn">Create Account</button>
            <div class="login-link">
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </div>
        </form>
    </div>
</div>

<script>
function toggleRoleFields() {
    const role = document.getElementById('role').value;
    const studentFields = document.getElementById('studentFields');
    const professorFields = document.getElementById('professorFields');
    
    studentFields.style.display = 'none';
    professorFields.style.display = 'none';
    
    if(role === 'student') studentFields.style.display = 'block';
    if(role === 'professor') professorFields.style.display = 'block';
}
</script>
</body>
</html>
