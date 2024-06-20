<?php
	include ('authorize.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hospital Management System</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/progress_bar.css">
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

<body onload = "setLinkValues('dash','dashboard')">
	<?php include ('../assets/includes/navbar.php'); ?>
	<main class="ad-main">
		<h2 class="welcome" id="heading">Dashboard</h2>
		<div class="admin-container">
			<div class="admin-links">
				<a href="#" onclick="showContent('dashboard',this)" id='dash' class="links active">Dashboard</a>
				<a href="#" onclick="showContent('doctor',this)" class="links">Doctors</a>
				<a href="#" onclick="showContent('patient',this)" class="links">Patients</a>
				<a href="#" onclick="showContent('appointment',this)" class="links">Appointments</a>
				<a href="#" onclick="showContent('prescription',this)" class="links">Prescription</a>
				<a href="#" onclick="logout()" class="links">Logout</a>

			</div>


			<!-- overview and dashboard -->
			<div id="dashboard" class="dash content">
				
			<?php include 'dashboard.php'; ?>
				<div class="pop-doctor">
				
					<?php include 'popularDoctors.php'; ?>
				</div>
			</div>
			
			
			<!-- doctor part -->
			<div id="doctor" class="content hidden">
				<?php include ('doctor/doctor.php'); ?>
			</div>
			

			

			<div id="patient" class="content hidden">
				<?php include ('patient/patient.php'); ?>				

				<!-- patient table end -->
			</div>

			<!-- appointment -->
			<div id="appointment" class="content hidden">
				<?php include ('appointment/appointment.php'); ?>
				<!-- apt table end -->
			</div>

			<!-- prescription -->
			<?php include ('./prescription/prescription.php'); ?>

			<!-- <div id="prescription" class="content hidden">
				This is prescripton
			</div> -->

		</div>
	</main>
	<script src="../assets/js/script.js"></script>
	<script src="../assets/js/search.js"></script>
	<script src="../assets/js/validationAndForm.js"></script>	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
</body>

</html>