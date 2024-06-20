<div class="abovelist">

	<div class="filter">
		<select onchange ="filterApt(event,'../admin/appointment/apt_search.php','appointment-table')">
			<option value="all">All</option>
			<option value="scheduled">Scheduled</option>
			<option value="pending">Pending</option>
			<option value="completed">Completed</option>
			<option value="cancelled">Cancelled</option>
			<option value="noshow">No-Show</option>
		</select>
	</div>
	<div class="apt-search">

		<input type="text" id="apt-id" class="input" placeholder="Enter appointment-id">
		<button class="button" onclick="Search('apt-id','appointment-table','../admin/appointment/apt_search.php')">Search</button>
	</div>

</div>

<!-- appointment table start -->
<div class="table-container" id="appointment-table">
	<table cellspacing="0" class="table">
		<tr>
			<th class="table-width num">Appointment id</th>
			<th class="table-width num">Patient id</th>
			<th class="table-width">Patient name</th>
			<th class="table-width">Gender</th>
			<th class="table-width">Email</th>
			<th class="table-width">Contact</th>
			<th class="table-width">Doctor Name</th>
			<th class="table-width">Appointment Date</th>
			<th class="table-width">Appointment Time</th>
			<th class="">Appointment Status</th>

		<tr>
			<!-- fetching table rows -->
			<?php
				$query = "SELECT aid,patient_id,patient.name as pname,gender,patient.email,cont,doctor.name as dname,apt_date,apt_time,apt_status from appointment,patient,doctor where patient_id=pid and doctor_id=did order by aid desc";
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
							$staus = 'Cancelled by patient';
							break;
						case 3:
							$status = 'Pending';
							break;
						case 4:
							$status = 'Completed';
							break;
						case 5:
							$status = 'No-show';
							break;
						default:
							$status = 'No info';
					}
				echo "<tr>";
				echo "<td class='table-width num'>".$row['aid']."</td>";
				echo "<td class='table-width num'>".$row['patient_id']."</td>";
				echo "<td class='table-width'>".$row['pname']."</td>";
				echo "<td class='table-width'>".$row['gender']."</td>";
				echo "<td class='table-width'>".$row['email']."</td>";
				echo "<td class='table-width'>".$row['cont']."</td>";
				echo "<td class='table-width'>".$row['dname']."</td>";
				echo "<td class='table-width'>".$row['apt_date']."</td>";
				echo "<td class='table-width'>".$row['apt_time']."</td>";
				echo "<td class=''>".$status."</td>";
				
				}			
			?>
	</table>
	<!-- finished fetching table rows -->

</div>