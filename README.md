# Thesis Connect 🎓

**A Web Technology Based Thesis Management Platform**

## Project Description

**Thesis Connect** is a web-based thesis management system developed as a **Web Technology academic project**.
The platform helps students find thesis supervisors, form groups, and apply for thesis supervision, while professors can manage applications, availability, and student assignments.

The system introduces transparency, structured communication, and automation in the thesis supervision process.

🎯 Motivation
In traditional thesis processes, students often face:

* Unclear supervisor availability
* Manual communication for thesis requests
* Difficulty finding group members
* No proper application tracking

**Thesis Connect** was developed to digitally manage and simplify this process using modern web technologies.


## Problem It Solves

* Manual thesis supervisor selection
* No centralized student–faculty interaction
* Lack of application notification system
* Difficulty managing thesis groups


 ✨ Key Features

👨‍🎓 Student Features
* View all student and professor profiles
* Search for group mates
* Email other students for group formation
* Filter professors by research area
* View faculty seat availability
* Apply for thesis supervision
* Receive notification after application approval

👨‍🏫 Professor Features
* View student profiles
* Display research interests and designation
* Set thesis supervision seat availability
* Receive thesis applications from students
* Accept or reject applications
* Manage assigned students

🔔 Notification System 

* **Professor Notification:**
  Professor receives notification when a student applies for thesis supervision.

* **Student Notification:**
  Student receives notification when the professor accepts the application.

> ⚠️ Current version implements notification UI & backend logic using PHP.

🧰 Technologies Used

This project is developed as a **Web Technology project** using:
* **HTML5** – Page structure
* **CSS3** – Styling and layout
* **JavaScript** – UI interactions
* **PHP** – Server-side logic
* **MySQL** – Database management
* **Font Awesome** – Icons
* **XAMPP** – Local server environment

 📂 Project Structure

```
thesissconnect/
├── assets/
│   ├── css/
│   └── images/
├── admin.html
├── homepage.php
├── login.php
├── logincheck.php
├── logout.php
├── registration.php
├── student.php
├── professor.php
├── profile.php
├── apply.php
├── accept_request.php
├── reject_request.php
├── assigned_students.php
├── assigned_supervisor.php
├── notices.php
├── create_notice.php
├── searchprof.php
├── filter.html
├── db.php
├── updateprofile.php
├── thesissconnect.sql
└── README.md
```

 ⚙️ How to Run the Project
1. Install **XAMPP**
2. Start **Apache** and **MySQL**
3. Copy the project folder to:

```
C:\xampp\htdocs\thesissconnect
```
4. Import database:

   * Open `phpMyAdmin`
   * Create database
   * Import `thesissconnect.sql`

5. Open browser and run:
```
http://localhost/thesissconnect/homepage.php
```


 🧪 How to Use
* Open homepage
* Login using ID & password (Student / Professor / Admin)
* Browse profiles
* Filter professors by research area
* Apply for thesis supervision
* Receive and manage notifications

 📈 Future Improvements
* Real-time notification system
* Email notification integration
* Enhanced security & validation
* Thesis progress tracking
* Role-based dashboard optimization

## 👥 Credits

 👨‍🏫 Faculty Supervisor
 **WAHIDUL ALAM RIYAD**

💡 Project Idea
 **Fatima**
 **Abdulla**

🤝 Contributors
* Fatima
* Abdulla

📜 License
This project is developed for **academic and educational purposes only**.

❤️ Final Note
**Thesis Connect** demonstrates the practical application of **Web Technologies** in solving real academic problems.
The project focuses on usability, clarity, and structured system design.
