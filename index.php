<?php
session_start();
if(isset($_SESSION['userid'])){
    if($_SESSION['userid']==1){
        header('location:admin.php');
        exit;
    }
    else if($_SESSION['userid']==2){
        header('location:doctor.php');
        exit;
    }
    else if($_SESSION['userid']==3){
        header('location:patient.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body>
    <nav>
        <div class="nav">
            <div class="logo">
                Hospital Management System
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="main">
        <h2 class="welcome">Welcome</h2>
        <div class="container">
            <div class="hospital-icon">
                <img src="assets/images/hospital.png" alt="hospital icon">
            </div>
            <div class="form-container">
                <div class="login-role">
                  <div class="toggle-role">
                    <span id='role-patient' onclick="showForm('patient-login',this)" class="role active">Patient</span>
                    <span id='role-doctor' onclick="showForm('doctor-login',this)" class="role">Doctor</span>
                    <span id='role-admin' onclick="showForm('admin-login',this)" class="role">Admin</span>
                  </div>
                </div>

                <!-- login patient form -->
                <div class="form" id="patient-login">
                    <div>Login as Patient</div>
                    <form action="patient_login.php" method="POST">
                        <div class="email_password">

                            <div class="email">
                                Email<br>
                                <input type="email" name="email" class="input"  required>
                                <br>
                                <span ></span>
                            </div>
                            <div class="password">
                                Password<br>
                                <input type="password" name="password" class="input"id="password" required><br>
                                <button type="submit" name="submit" class="btn-submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- login admin form -->
                <div class="form hidden" id='admin-login'>
                    <div>Login as Admin</div>
                    <form action="admin_login.php" method="POST" >
                        <div class="email_password">

                            <div class="email">
                                Username<br>
                                <input type="text" name="username" class="input" required>
                                <br>
                                <span ></span>
                            </div>
                            <div class="password">
                                Password<br>
                                <input type="password" name="password" class="input"  required><br>
                                <button type="submit" name="submit" class="btn-submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- login doctor form -->
                <div id='doctor-login' class="form hidden">
                    <div>Login as Doctor</div>
                    <form action="doctor_login.php" method="POST" >
                        <div class="email_password">

                            <div class="email">
                                Email<br>
                                <input type="text" name="email" class="input" required>
                                <br>
                                <span></span>
                            </div>
                            <div class="password">
                                Password<br>
                                <input type="password" name="password" class="input"  required><br>
                                <button type="submit" name="submit" class="btn-submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </main>
    <script src="assets/script.js"></script>
</body>
</html>