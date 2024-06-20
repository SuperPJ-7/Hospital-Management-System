<?php
include('authorize.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hospital Management System</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/patient_style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/patient_profile.css">
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

<body onload="setLinkValues('prof','profcon')">

	<nav>
		<div class="nav">
			<div class="logo">
				Hospital Management System
			</div>
			<div class="profile">
				
				<div class="profile-icon" id="profile-icon">
					<span><?php echo $_SESSION['username']; ?></span>
					<img src="../assets/images/user.png">
				</div>
				<div id="dropdown">
					<div class="logout-container">
					<a onclick="logout()">Log out</a>
					</div>
				</div>
			</div>

	</nav>
	<main class="ad-main">
		<h2 class="welcome">Welcome <?php echo $_SESSION['username']; ?></h2>
		<div class="patient-container">
			<div class="patient-links">
				<a href="#" onclick="showContent('profcon',this)" id='prof' class="links active">Profile</a>
				<a href="#" onclick="showContent('bk-apt',this)" class="links">Booking</a>
                <a href="#" onclick="showContent('up-apt',this)" class="links">Appointments</a>
				
				<a href="#" onclick="showContent('pres',this)" class="links">Prescriptions</a>
				<a onclick="logout()"  class="links">Logout</a>
			</div>
			<div id="profcon" class="content">
				<?php include ('patient_profile.php'); ?>
			</div>
			
			<!-- booking appointment -->
			<div id="bk-apt" class="content hidden">
				<?php  include ('apt_book.php'); ?>
			</div>
			
			<!-- upcoming appointment  -->
			<div id="up-apt" class="content hidden">
				<?php include ("apt_list.php"); ?>
			</div>
			
			

			<!-- prescriptions -->
			<div id="pres" class="content hidden">
				<?php include("prescriptions.php"); ?>
			</div>
			
			
		</div>
	</main>
	
	
	<script src="../assets/js/doctor_script.js"></script>
	<script src="../assets/js/search.js"></script>
	<script src="../assets/js/script.js"></script>
	<script src="https://kit.fontawesome.com/a865739a53.js" crossorigin="anonymous"></script>


</body>

</html>
