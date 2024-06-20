<?php
    include ('../doctor/authorize.php');
?>

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

	</tr>
		<!-- fetching table rows -->
		<?php
			$aid = (isset($_POST['key']))?$_POST['key']:'';
			if(!isset($_SESSION['fq'])){
				$filterQuery = '';
			}
			else{
				$filterQuery = $_SESSION['fq'];
			}
			if(isset($_POST['status'])){
				$status = $_POST['status'];
				switch($status){
					case 'all':
						$filterQuery = '';
						break;
					case 'scheduled':
						$filterQuery = " and apt_status='0'";
						break;
					case 'pending':
						$filterQuery = " and apt_status='3'";
						break;
					case 'completed':
						$filterQuery = " and apt_status='4'";
						break;
					case 'cancelled':
						$filterQuery = " and (apt_status='2' or apt_status='1')";
						break;
					case 'noshow':
						$filterQuery = " and apt_status='5'";
						break;
				}
			}
			// $query = "select aid,did,doctor.name as dname,spec,doctor.email,doctor.contact,apt_date,apt_time,apt_status from appointment,doctor,patient where patient_id=pid and doctor_id=did and patient_id='$pid' and aid='$aid'".$filterQuery;
			$query = "SELECT aid,patient_id,patient.name as pname,gender,patient.email,cont,doctor.name as dname,apt_date,apt_time,apt_status from appointment,patient,doctor where patient_id=pid and doctor_id=did and aid='$aid'".$filterQuery." order by aid desc";
			
            if($aid==''){
                $query = "SELECT aid,patient_id,patient.name as pname,gender,patient.email,cont,doctor.name as dname,apt_date,apt_time,apt_status from appointment,patient,doctor where patient_id=pid and doctor_id=did".$filterQuery. " order by aid desc";
            }
            @$_SESSION['fq'] = $filterQuery;
			
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
						$status = 'No-Show';
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