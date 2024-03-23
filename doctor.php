<?php 
    session_start();
    include ('dbconfig.php');
    if(!isset($_SESSION['username']) || $_SESSION['userid']!=2){
        header('location:index.php');
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hospital Management System</title>
	<link rel="stylesheet" type="text/css" href="assets/style.css">
	<link rel="stylesheet" type="text/css" href="assets/doc_style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
	
	<style>
		body {
			background: white;
			color: black;
		}

		.nav {
			background: linear-gradient(to right, #1e48a3, #5ba5ea);
		}

		.ad-main {
			margin: 0px;
		}
	</style>
</head>

<body>
	<nav>
		<div class="nav">
			<div class="logo">
				Hospital Management System
			</div>
			<div class="profile">
				
				<div class="profile-icon" id="profile-icon">
					<span><?php echo $_SESSION['username']; ?></span>
					<img src="assets/images/user.png">
				</div>
				<div id="dropdown">
					<div class="logout-container">
					<a href="logout.php">Log out</a>
					</div>
				</div>
			</div>

	</nav>
	<main class="ad-main">
		<h2 class="welcome">Welcome <?php echo $_SESSION['username']; ?></h2>
		<div class="patient-container">
			<div class="patient-links">
				<a href="#" onclick="showcontentDoctor('doc-profcon',this)" id='doc-prof' class="links active">Profile</a>
				<a href="#" onclick="showcontentDoctor('apt',this)" class="links">Appointments</a>
                
				<a href="#" onclick="showcontentDoctor('pres',this)" class="links">Prescriptions</a>
				<a href="#"  class="links">Logout</a>
			</div>
			<div id="doc-profcon" class="content">
				<?php include 'doctor_profile.php'; ?>
			</div>
			
			
			<!--appointment list -->
			<div id="apt" class="content hidden">
				<?php include('doc_apt_list.php'); ?>
			</div>
			

			
			

			<!-- prescriptions -->
			<div id="pres" class="content hidden">
				<?php include('doc_prescription.php'); ?>
			</div>

		</div>
	</main>
	<script src="assets/doctor_script.js"></script>
	<script src="assets/script.js"></script>


</body>

</html>