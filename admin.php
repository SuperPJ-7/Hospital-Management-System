<?php
	//checking if admin is already logged in
	session_start();
	if(!isset($_SESSION['username']) || $_SESSION['userid']!=1){
		header('location:index.php');
	}
	include ('dbconfig.php');

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
		<h2 class="welcome" id="heading">Dashboard</h2>
		<div class="admin-container">
			<div class="admin-links">
				<a href="#" onclick="showcontent('dashboard',this)" id='dash' class="links active">Dashboard</a>
				<a href="#" onclick="showcontent('doctor',this)" class="links">Doctors</a>
				<a href="#" onclick="showcontent('nurse',this)" class="links">Nurses</a>
				<a href="#" onclick="showcontent('patient',this)" class="links">Patients</a>
				<a href="#" onclick="showcontent('appointment',this)" class="links">Appointments</a>
				<a href="#" onclick="showcontent('prescription',this)" class="links">Prescription</a>
				<a href="#"  class="links">Logout</a>

			</div>
			<div id="dashboard" class="dash content">
				Overview
				<div class="overview">
					<div class="box">
						<div class="box-left">
							<span><?php 
									$query = "SELECT * FROM doctor";
									$result = mysqli_query($conn, $query);
									$rows = mysqli_num_rows($result);
									echo $rows;								

							?></span>
							<span>Doctors</span>
						</div>
						<img src="assets/images/doctor.png" alt="doctor image">
					</div>
					<div class="box">
						<div class="box-left">
							<span>
								<?php 
									$query = "SELECT * FROM nurse";
									$result = mysqli_query($conn, $query);
									$rows = mysqli_num_rows($result);
									echo $rows;	
								?>
							</span>
							</span>
							<span>Nurses</span>
						</div>
						<img src="assets/images/nurse.png" alt="nurse image">
					</div>
					<div class="box">
						<div class="box-left">
							<span>
								<?php
									$query = "SELECT * FROM patient";
									$result = mysqli_query($conn, $query);
									$rows = mysqli_num_rows($result);
									echo $rows;	
								?>
							</span>
							<span>Patients</span>
						</div>
						<img src="assets/images/patient.png" alt="patient image">
					</div>
				</div>
				<div class="pop-doctor">
					This is popular doctor list
				</div>
			</div>
			<div id="doctor" class="content hidden">
			
				<div class="search">

					<!-- search using AJAX -->
					<input type="email" id="doc-email" placeholder="Enter email">
					<button class="button" id="btn-doc-search">Search</button>

					<!-- offcanvas doctor add form -->
					<button id="openFormBtn" class="button" onclick="openForm()">Add Doctor</button>

					<div id="sideFormContainer">
						<div id="sideForm">
							<span class="closeBtn" onclick="closeForm()">×</span>
							<h2>Enter doctor details</h2>
							<form action="doctor_add.php" method="POST">
								<label for="name">Name:</label>
								<input type="text" id="name" name="name" required><br><br>

								<label for="email">Email:</label>
								<input type="email" id="email" name="email" required><br><br>

								<label for="password">Password:</label>
								<input type="password" id="password" name="password" required><br><br>

								<label for="confirm password">Confirm Password:</label>
								<input type="password" id="conf-password" name="confirm" required><br><br>

								<label for="specialization">Specialization:</label>
								
								<select name="specialization">
									<option value="">Select</option>
									<option value="General">General</option>
									<option value="Cardiologist">Cardiologist</option>
									<option value="Neurologist">Neurologist</option>
									<option value="Dermatologist">Dermatologist</option>
								</select>
								<br><br>

								<label for="contact">Contact:</label>
								<input type="number" id="contact" name="contact" required><br><br>

								<label for="license">License Number:</label>
								<input type="text" id="license" name="license" required><br><br>


								<button type="submit" name="submit" class="button">Submit</button>
							</form>
						</div>
					</div>
					<!-- off canvas doctor add form over -->
				</div>
				<!-- doctor table start -->
				<div class="table-container" id="table-container">
					<table cellspacing="0" class="table">
						<tr>							
							<th class="table-width">Name</th>
							<th class="table-width">Specialization</th>
							<th class="table-width">Contact</th>
							<th class="table-width">Email</th>
							<th class="table-width">Password</th>
							<th class="table-width">License</th>
							<th >Action</th>							
						<tr>
							<!-- fetching table rows -->
						<?php
							$query = "SELECT *from doctor";
							$result = mysqli_query($conn, $query);
							while ($row = mysqli_fetch_assoc($result)) {
							 echo "<tr>";
							 echo "<td class='table-width'>".$row['name']."</td>";
							 echo "<td class='table-width'>".$row['spec']."</td>";
							 echo "<td class='table-width'>".$row['contact']."</td>";
							 echo "<td class='table-width'>".$row['email']."</td>";
							 echo "<td class='table-width'>".$row['password']."</td>";
							 echo "<td class='table-width'>".$row['lic']."</td>";
							 echo "<td> <a href='doc_delete.php?id=".$row['did']."' class='button'>Delete</a></td>";
							 echo "</tr>";
							}
						?>
					</table>
					<!-- finished fetching table rows -->
					
				</div>

				<!-- doctor table end -->
			</div>

			<!-- nurse  -->
			<div id="nurse" class="content hidden">
			
				<div class="search">
					<!-- AJAX nurse search -->
					<input type="email" name="email" id="nurse-email" placeholder="Enter email">
					<button id="btn-nurse-search" class="button">Search</button>					

					<!-- offcanvas nurse add form -->
					<button id="openFormBtn2" class="button" onclick="openForm2()">Add Nurse</button>

					<div id="sideFormContainer2">
						<div id="sideForm2">
							<span class="closeBtn" onclick="closeForm2()">×</span>
							<h2>Enter Nurse details</h2>
							<form action="nurse_add.php" method="POST">
								<label for="name">Name:</label>
								<input type="text" id="nurse-name" name="name" required><br><br>

								<label for="email">Email:</label>
								<input type="email" id="nurse-email" name="email" required><br><br>

								<!-- <label for="password">Password:</label>
								<input type="password" id="password" name="password" required><br><br>

								<label for="confirm password">Confirm Password:</label>
								<input type="password" id="conf-password" name="confirm" required><br><br> -->
						
								<label for="contact">Contact:</label>
								<input type="number" id="nurse-contact" name="contact" required><br><br>
								
								<button type="submit" name="submit" class="button">Submit</button>
							</form>
						</div>
					</div>
					<!-- off canvas nurse add form over -->
				</div>
				<!-- nurse table start -->
				<div class="table-container" id="nurse-table">
					<table cellspacing="0" class="table">
						<tr>							
							<th class="table-width">Name</th>							
							<th class="table-width">Contact</th>
							<th class="table-width">Email</th>
							
							
							<th >Action</th>							
						<tr>
							<!-- fetching table rows -->
						<?php		
							$query = "SELECT *from nurse";
							$result = mysqli_query($conn, $query);
							while ($row = mysqli_fetch_assoc($result)) {
							 echo "<tr>";
							 echo "<td class='table-width'>".$row['name']."</td>";
							 echo "<td class='table-width'>".$row['contact']."</td>";
							 echo "<td class='table-width'>".$row['email']."</td>";
							 echo "<td> <a href='nurse_delete.php?id=".$row['nid']."' class='button'>Delete</a></td>";
							 echo "</tr>";
							}	
						?>
					</table>
					<!-- finished fetching table rows -->
					
				</div>

				<!-- nurse table end -->
			</div>

			<div id="patient" class="content hidden">
			
				<div class="search">
					
					<!-- search using AJAX -->
					<input type="email" id="patient-email" placeholder="Enter email">
					<button class="button" id="btn-pat-search">Seach</button>

					<!-- offcanvas patient add form -->
					<button id="openFormBtnPat" class="button" onclick="openFormPat()">Add Patient</button>

					<div id="sideFormContainerPat">
						<div id="sideFormPat">
							<span class="closeBtn" onclick="closeFormPat()">×</span>
							<h2>Enter Patient details</h2>
							<form action="patient_add.php" method="POST">
								<label for="name">Name:</label>
								<input type="text" name="name" required><br><br>

								<label for="email">Email:</label>
								<input type="email"  name="email" required><br><br>

								<label for="password">Password:</label>
								<input type="password"  name="password" required><br><br>

								<label for="confirm password">Confirm Password:</label>
								<input type="password"  name="confirm" required><br><br>

								<label for="Gender">Gender:</label>								
								<select name="gender">
									<option value="">Select</option>
									<option value="male">Male</option>
									<option value="Female">Female</option>
								</select>
								<br><br>

								<label for="contact">Contact:</label>
								<input type="number" name="contact" required><br><br>

								<label for="Date">Date:</label>
								<input type="date"  name="dob" required><br><br>


								<button type="submit" name="submit" class="button">Submit</button>
							</form>
						</div>
					</div>
					<!-- off canvas patient add form over -->
				</div>
				<!-- patient table start -->
				<div class="table-container" id="patient-table">
					<table cellspacing="0" class="table">
						<tr>							
							<th class="table-width">Name</th>
							<th class="table-width">Gender</th>
							<th class="table-width">DOB</th>
							<th class="table-width">Contact</th>
							<th class="table-width">Email</th>
							<th class="table-width">Password</th>
							<th >Action</th>							
						<tr>
							<!-- fetching table rows -->
						<?php
							$query = "SELECT *from patient";
							$result = mysqli_query($conn, $query);
							while ($row = mysqli_fetch_assoc($result)) {
							 echo "<tr>";
							 echo "<td class='table-width'>".$row['name']."</td>";
							 echo "<td class='table-width'>".$row['gender']."</td>";
							 echo "<td class='table-width'>".$row['dob']."</td>";
							 echo "<td class='table-width'>".$row['cont']."</td>";
							 echo "<td class='table-width'>".$row['email']."</td>";
							 echo "<td class='table-width'>".$row['password']."</td>";
							 echo "<td> <a href='patient_delete.php?id=".$row['pid']."' class='button'>Delete</a></td>";
							 echo "</tr>";
							}
						?>
					</table>
					<!-- finished fetching table rows -->
					
				</div>

				<!-- patient table end -->
			</div>

			<!-- appointment -->
			<div id="appointment" class="content hidden">
			
				
				<!-- appointment table start -->
				<div class="table-container" id="appointment-table">
					<table cellspacing="0" class="table">
						<tr>							
							<th class="table-width">Appointment id</th>
							<th class="table-width">Patient id</th>
							<th class="table-width">Patient name</th>
							<th class="table-width">Gender</th>
							<th class="table-width">Email</th>
							<th class="table-width">Contact</th>
							<th class="table-width">Doctor Name</th>
							<th class="table-width">Appointment Date</th>
							<th class="table-width">Appointment Time</th>
							<th class="table-width">Appointment Status</th>
													
						<tr>
							<!-- fetching table rows -->
						<?php
							$query = "SELECT aid,patient_id,patient.name as pname,gender,patient.email,cont,doctor.name as dname,apt_date,apt_time,apt_status from appointment,patient,doctor where patient_id=pid and doctor_id=did";
							$result = mysqli_query($conn, $query);
							while ($row = mysqli_fetch_assoc($result)) {
							 echo "<tr>";
							 echo "<td class='table-width'>".$row['aid']."</td>";
							 echo "<td class='table-width'>".$row['patient_id']."</td>";
							 echo "<td class='table-width'>".$row['pname']."</td>";
							 echo "<td class='table-width'>".$row['gender']."</td>";
							 echo "<td class='table-width'>".$row['email']."</td>";
							 echo "<td class='table-width'>".$row['cont']."</td>";
							 echo "<td class='table-width'>".$row['dname']."</td>";
							 echo "<td class='table-width'>".$row['apt_date']."</td>";
							 echo "<td class='table-width'>".$row['apt_time']."</td>";
							 echo "<td class='table-width'>".$row['apt_status']."</td>";
							 
							}
						?>
					</table>
					<!-- finished fetching table rows -->
					
				</div>

				<!-- patient table end -->
			</div>

			<!-- prescription -->
			<?php include 'prescription.php'; ?>

			<!-- <div id="prescription" class="content hidden">
				This is prescripton
			</div> -->

		</div>
	</main>
	<script src="assets/script.js"></script>


</body>

</html>