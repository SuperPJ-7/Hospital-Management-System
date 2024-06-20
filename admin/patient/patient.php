<div class="search">

	<!-- search using AJAX -->
	<input type="email" id="patient-email" placeholder="Enter email">
	<button class="button" onclick="searchEmail('patient-email','../admin/patient/patient_search.php','patient-table')">Search</button>

	<!-- offcanvas patient add form -->
	<button id="openFormBtnPat" class="button" onclick="openForm('patSideForm','patForm')">Add Patient</button>

	<div id="patSideForm">
		<div id="patForm">
			<span class="closeBtn" onclick="closeForm('patSideForm','patForm')">×</span>
			<h2>Enter Patient details</h2>
			<form action="patient/patient_add.php" method="POST" onsubmit="return valPat()">
				<label for="name">Name:</label>
				<input type="text" id='patName' name="name" ><br><br>

				<label for="email">Email:</label>
				<input type="email" id='pat-add-email' name="email" ><br><br>

				<label for="password">Password:</label>
				<input type="password" id='patPw' name="password" ><br><br>

				<label for="confirm password">Confirm Password:</label>
				<input type="password"id='patConf' name="confirm" ><br><br>

				<label for="Gender" >Gender:</label>
				<select name="gender" id='patGender'>
					<option value="">Select</option>
					<option value="male">Male</option>
					<option value="Female">Female</option>
				</select>
				<br><br>

				<label for="contact" >Contact:</label>
				<input type="text" name="contact" id='patCont'><br><br>

				<label for="Date">DOB:</label>
				<input type="date" id='patDob' name="dob" ><br><br>


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
			<th>Action</th>
		<tr>
			<!-- fetching table rows -->
			<?php
				$query = "SELECT *from patient where is_deleted=FALSE";
				$result = mysqli_query($conn, $query);
				while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td class='table-width'>".$row['name']."</td>";
				echo "<td class='table-width'>".$row['gender']."</td>";
				echo "<td class='table-width'>".$row['dob']."</td>";
				echo "<td class='table-width'>".$row['cont']."</td>";
				echo "<td class='table-width'>".$row['email']."</td>";
				echo "<td class='table-width'>".$row['password']."</td>";
				echo "<td> <a href='patient/patient_delete.php?id=".$row['pid']."' class='button cancel'>Delete</a></td>";
				echo "</tr>";
				}
			?>
	</table>
	<!-- finished fetching table rows -->

</div>