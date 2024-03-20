<!-- search using AJAX -->
<div class="search">

	<input type="number" id="apt-id" class="input" min="1' placeholder="Enter appointment-id">
	<button class="button" id="btn-doc-search">Search</button>
</div>

<!-- appointment table start -->
<div class="table-container" id="table-container">
	<table cellspacing="0" class="table">
		<tr>
			<th class="table-width">Appointment ID</th>
			<th class="table-width">Patient ID</th>
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
			$query = "select aid,patient_id as id,patient.name as pname,patient.gender,patient.email,patient.cont,apt_date,apt_time,apt_status from appointment,doctor,patient where patient_id=pid and doctor_id=did and doctor_id='$did'";
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
					default:
						$status = 'No info';
				}
				echo "<tr>";
				echo "<td class='table-width'>" . $row['aid'] . "</td>";
				echo "<td class='table-width'>" . $row['id'] . "</td>";
				echo "<td class='table-width'>" . $row['pname'] . "</td>";
				echo "<td class='table-width'>" . $row['gender'] . "</td>";
				echo "<td class='table-width'>" . $row['email'] . "</td>";
				echo "<td class='table-width'>" . $row['cont'] . "</td>";
				echo "<td class='table-width'>" . $row['apt_date'] . "</td>";
				echo "<td class='table-width'>" . $row['apt_time'] . "</td>";
				echo "<td class='table-width'>" . $status . "</td>";
				if ($status == 'Pending') {

					echo "<td> <a href='apt-confirm.php?id=" . $row['aid'] . "' class='button'>Confirm</a>
                <a href='apt-cancel.php?id=" . $row['aid'] . "' class='button cancel'>Cancel</a></td>
                                 ";
				} else {
					?>
					<td> <button class='button disableBtn '>Confirm</button>
                <button class='button disableBtn'>Cancel</button></td>
					<?php
				}
				//prescribe
				if ($status == 'Scheduled') {

					echo "<td> <a href='prescribeForm.php?id=" . $row['aid'] . "' class='button'>Prescribe</a></td>";
				} else {
					
					echo "<td> <button class='button disableBtn '>Prescribe</button>";
                
					
				}
				
				echo "</tr>";
			}
			?>
	</table>
	<!-- finished fetching table rows -->

</div>
