<div class="overview">
	<div class="box">
		<div class="box-left">
			<span>
				<?php 
					$query = "SELECT * FROM doctor where status='1'";
					$result = mysqli_query($conn, $query);
					$rows = mysqli_num_rows($result);
					echo $rows;								

				?>
			</span>
			<span>Doctors</span>
		</div>
		<img src="../assets/images/doctor.png" alt="doctor image">
	</div>
	<div class="box">
		<div class="box-left">
			<span style="padding-left: 6px;">
				<?php 
					$query = "SELECT aid FROM appointment where apt_status ='0' or apt_status='3'";
					$result = mysqli_query($conn, $query);
					$rows = mysqli_num_rows($result);
					echo $rows;	
				?>
			</span>
			<span style="height: 45px;font-size: 17px;padding-left: 5px;">Upcoming Appointments</span>
		</div>
		<img src="../assets/images/schedule.png" alt="apt image">
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
		<img src="../assets/images/patient.png" alt="patient image">
	</div>
</div>