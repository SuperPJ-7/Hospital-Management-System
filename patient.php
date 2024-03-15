<?php 
    session_start();
    include ('dbconfig.php');
    if(!isset($_SESSION['username']) || $_SESSION['userid']!=3){
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
	<link rel="stylesheet" type="text/css" href="assets/patient_style.css">
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
				<a href="#" onclick="showcontentPatient('profcon',this)" id='prof' class="links active">Profile</a>
				<a href="#" onclick="showcontentPatient('bk-apt',this)" class="links">Book Appointment</a>
                <a href="#" onclick="showcontentPatient('up-apt',this)" class="links">Upcoming Appointment</a>
				<a href="#" onclick="showcontentPatient('his-apt',this)" class="links">Appointment History</a>
				<a href="#" onclick="showcontentPatient('pres',this)" class="links">Prescriptions</a>
				<a href="#"  class="links">Logout</a>
			</div>
			<div id="profcon" class="content">
				<div class="profcon">
					<div class="photo">
						<img src="assets/images/user.png" alt="patient img">
					</div>
					<div class="patient-info">
						<div class="row">
							<div>Name</div>
							<div>Patient-id</div>
							<div>Date of Birth</div>
							<div>Gender</div>
							<div>Contact</div>
							<div>Email</div>
						</div>
						<div class="row">
							<?php
								// if(isset($_GET['id'])){
									// $pid = $_GET['id'];
									$pid = $_SESSION['patient-id'];
									$query = "SELECT *FROM patient WHERE pid=$pid";
									$result = mysqli_query($conn,$query);
									$resultData = mysqli_fetch_assoc($result);
									echo "<div>".$resultData['name']."</div>";
									echo "<div>".$resultData['pid']."</div>";
									echo "<div>".$resultData['dob']."</div>";
									echo "<div>".$resultData['gender']."</div>";
									echo "<div>".$resultData['cont']."</div>";
									echo "<div>".$resultData['email']."</div>";
								// }
							?>
							
						</div>
					</div>
				</div>
			</div>
			
			<!-- booking appointment -->
			<div id="bk-apt" class="content hidden">
				<div class="appointment-container">
					<div class="form-container">
						<div><h3>Create an Appointment</h3></div>
						<form action="apt_add.php" class="form" id="apt-form" method="POST">
							<label for="specialization">Specialization</label>
							<select name="spec" id="spec-select" class="input">
								<option value="">Select Specialization</option>
								<?php
									$query = "SELECT distinct spec from doctor";
									$result = mysqli_query($conn,$query);
									
									while($data = mysqli_fetch_assoc($result))
									{
										$spec = $data['spec'];
										echo "<option value=$spec>".$spec."</option>";
									}
								?>
							</select>
							<br><br>
							<label for="doctor">Doctors</label>
							<select name="doctor" id="doc-select" class="input">
								<option value="">Select Doctor</option>
							</select>
							<br><br>
							<label for="date">Date</label>
							<input type="date" class="input" name="date"><br><br>
							<label for="time">Time</label>
							<input type="time" class="input" name="time">
							<br><br>
							<input type="submit" name="submit" class="button" value="Create new entry"</input>
	
						</form>

					</div>
				</div>
			</div>

			<!-- upcoming appointment  -->
			<div id="up-apt" class="content hidden">
				this is upcoming apt
			</div>

			<!-- appointment history -->
			<div id="his-apt" class="content hidden">
				this is apt history
			</div>

			<!-- prescriptions -->
			<div id="pres" class="content hidden">
				this is prescsriptions
			</div>

		</div>
	</main>
	<script src="assets/patient_script.js"></script>
	<script src="assets/script.js"></script>


</body>

</html>