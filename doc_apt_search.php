<?php

	include 'dbconfig.php';
	session_start();
?>
<table cellspacing="0" class="table">
		<tr>
			<th class="table-width num">Appointment ID</th>
			<th class="table-width num">Patient ID</th>
			<th class="table-width">Patient Name</th>
			<th class="table-width">Gender</th>
			<th class="table-width">Email</th>
			<th class="table-width">Contact</th>
			<th class="table-width">Appointment Date</th>
			<th class="table-width">Appointment Time</th>
			<th class="table-width">Current Status</th>
			<th class="table-width">Action</th>
			<th class="table-width">Prescribe</th>

		<tr>
			<!-- fetching table rows -->
			<?php
			$did = $_SESSION['doctor-id'];
            $aid = $_POST['aid'];
			$query = "select patient_id as id,patient.name as pname,patient.gender,patient.email,patient.cont,apt_date,apt_time,apt_status from appointment,doctor,patient where aid = '$aid' and patient_id=pid and doctor_id=did and doctor_id='$did'";
			$result = mysqli_query($conn, $query);

			while ($row = mysqli_fetch_assoc($result)) {
				switch ($row['apt_status']) {
					case 0:
						$status = 'Scheduled';
						break;
					case 1:
						$status = 'Cancelled by you';
						break;
					case 2:
						$staus = 'Cancelled by patient';
						break;
					case 3:
						$status = 'Pending';
						break;
					case 4:
						$status = 'Completed';
						break;
					default:
						$status = 'No info';
				}
				echo "<tr>";
				echo "<td class='table-width num'>" . $aid . "</td>";
				echo "<td class='table-width num'>" . $row['id'] . "</td>";
				echo "<td class='table-width'>" . $row['pname'] . "</td>";
				echo "<td class='table-width'>" . $row['gender'] . "</td>";
				echo "<td class='table-width'>" . $row['email'] . "</td>";
				echo "<td class='table-width'>" . $row['cont'] . "</td>";
				echo "<td class='table-width'>" . $row['apt_date'] . "</td>";
				echo "<td class='table-width'>" . $row['apt_time'] . "</td>";
				echo "<td class='table-width'>" . $status . "</td>";
				if ($status == 'Pending') {

					echo "<td class='table-width'> <a href='apt-confirm.php?id=" . $aid. "' class='button'>Confirm</a>
                <a href='apt-cancel.php?id=" . $aid . "' class='button cancel'>Cancel</a></td>";
                                 
				} else {
					?>
					<td class='table-width'> <button class='button disableBtn '>Confirm</button>
                <button class='button disableBtn'>Cancel</button></td>
					<?php
				}
				//prescribe
				if ($status == 'Scheduled') {

					echo "<td> <a href='prescribeForm.php?pid=" . $row['id'] ."&aid=".$aid. "' class='button'>Prescribe</a></td>";
				} else {
					
					echo "<td> <button class='button disableBtn '>Prescribe</button>";
                
					
				}
				
				echo "</tr>";
			}
			?>
	</table>
	