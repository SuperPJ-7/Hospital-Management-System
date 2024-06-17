<!-- search using AJAX -->
<div class="abovelist">

	<div class="filter">
		<select id="apt-status">
			<option value="all">All</option>
			<option value="scheduled">Scheduled</option>
			<option value="pending">Pending</option>
			<option value="completed">Completed</option>
			<option value="cancelled">Cancelled</option>
		</select>
	</div>
	<div class="apt-search">

		<input type="text" id="apt-id" class="input" placeholder="Enter appointment-id">
		<button class="button" onclick="patientAptSearch()">Search</button>
	</div>

</div>

<!-- appointment table start -->
<div class="table-container" id="patient-apt-table">
	<table cellspacing="0" class="table">
		<tr>
			<th class="table-width num">Appointment ID</th>
			<th class="table-width num">Doctor ID</th>
			<th class="table-width">Doctor Name</th>
			<th class="table-width">Specialization</th>
			<th class="table-width">Email</th>
			<th class="table-width">Contact</th>
			<th class="table-width">Appointment Date</th>
			<th class="table-width">Appointment Time</th>
			<th class="table-width">Current Status</th>
			<th class="table-width">Action</th>
		</tr>
			<!-- fetching table rows -->
			<?php
			$pid = $_SESSION['patient-id'];
			$query = "select aid,did,doctor.name as dname,spec,doctor.email,doctor.contact,apt_date,apt_time,apt_status from appointment,doctor,patient where patient_id=pid and doctor_id=did and patient_id='$pid'";
			$result = mysqli_query($conn, $query);

			while ($row = mysqli_fetch_assoc($result)) {
				switch ($row['apt_status']) {
					case 0:
						$status = 'Scheduled';
						break;
					case 1:
						$status = 'Cancelled by Doctor';
						break;
					case 2:
						$staus = 'Cancelled by you';
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
				echo "<td class='table-width num'>" . $row['aid'] . "</td>";
				echo "<td class='table-width num'>" . $row['did'] . "</td>";
				echo "<td class='table-width'>" . $row['dname'] . "</td>";
				echo "<td class='table-width'>" . $row['spec'] . "</td>";
				echo "<td class='table-width'>" . $row['email'] . "</td>";
				echo "<td class='table-width'>" . $row['contact'] . "</td>";
				echo "<td class='table-width'>" . $row['apt_date'] . "</td>";
				echo "<td class='table-width'>" . $row['apt_time'] . "</td>";
				echo "<td class='table-width'>" . $status . "</td>";
				if ($status == 'Pending' || $status == 'Scheduled') {

					echo "<td class='table-width'><a href='apt-cancel.php?id=" . $row['aid'] . "' class='button cancel'>Cancel</a></td>";
                                 
				} else {
				
					
                echo "<td class='table-width'><button class='button disableBtn'>Cancel</button></td>";
				}	
				
				echo "</tr>";
			}
			?>
	</table>
	<!-- finished fetching table rows -->

</div>
