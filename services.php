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
    <style>
        .main{
            display:flex;
            justify-content:center;
            flex-direction:column;
        }
        .services{
            width:50%;
            text-align:left;
        }
        .services ul li{
            list-style:none;
            margin-top:10px;

        }
        .services span{
            font-size: 49px;
            font-family: sans serif;
            font-weight:bold;
        }
        .boxes{
            display:flex;
            justify-content: space-between;
            margin:200px 50px;
            padding:10px;
            gap:20px;
        }

    </style>
</head>
<body>
    <nav>
        <div class="nav">
            <div class="logo">
                Hospital Management System
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">About us</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="main">
        <center>
        <div class="services">
            <span>Our Services</span>
            <ul>
                <li>24/7 Emergency Room (ER) Services</li>
                <li>Ambulance Services</li>
                <li>Intensive Care Unit (ICU)</li>
                <li>Imaging Services (X-ray, MRI, CT scan, Ultrasound)</li>

            </ul>
        </div>
        </center>
        <div class="boxes">
            <div>
                <h4>Make an Appointment</h4>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorum dolore quam fugit adipisci dolores illo sequi repellat delectus tempora minima.
            </div>
            <div>
                <h4>Get Diagnostic Report</h4>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non beatae accusantium tempora deleniti unde fugit id ea? Veniam, assumenda dolorum.
            </div>
            <div>
                <h4>Medical Checkup</h4>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt nisi facilis laboriosam odit vel repudiandae nobis vitae dolor adipisci! Cum.
            </div>
        </div>
    </main>
    <script src="assets/script.js"></script>
    <script src="https://kit.fontawesome.com/a865739a53.js" crossorigin="anonymous"></script>
</body>
</html>