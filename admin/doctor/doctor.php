<div class="search">

	<!-- search using AJAX -->
	<input type="email" id="doc-email" placeholder="Enter email">
	<button class="button" onclick="searchEmail('doc-email','doctor/doc_search.php','table-container')">Search</button>

	<!-- offcanvas doctor add form -->
	<button id="openFormBtn" class="button" onclick="openForm('docSideForm','docForm')">Add Doctor</button>

	<div id="docSideForm">
		<div id="docForm">
			<span class="closeBtn" onclick="closeForm()">×</span>
			<h2>Enter doctor details</h2>
			<form action="doctor/doctor_add.php" method="POST" onsubmit="return valDoc()">
				<label for="name">Name:</label>
				<input type="text" id="name" name="name" ><br><br>

				<label for="email">Email:</label>
				<input type="email" id="doc-add-email" name="email" ><br><br>

				<label for="password">Password:</label>
				<input type="password" id="password" name="password" ><br><br>

				<label for="confirm password">Confirm Password:</label>
				<input type="password" id="conf-password" name="confirm" ><br><br>

				<label for="specialization">Specialization:</label>

				<select name="specialization" id='specVal'>
					<option value="">Select</option>
					<option value="General">General</option>
					<option value="Cardiologist">Cardiologist</option>
					<option value="Neurologist">Neurologist</option>
					<option value="Dermatologist">Dermatologist</option>
				</select>
				<br><br>

				<label for="contact">Contact:</label>
				<input type="number" id="contact" name="contact" ><br><br>

				<label for="address">Address</label>
				<input type="text" id="address" name="address" ><br><br>

				<label for="license">License Number:</label>
				<input type="text" id="license" name="license" ><br><br>


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
			<th>Action</th>
		<tr>
			<!-- fetching table rows -->
			<?php
							
							$query = "SELECT *from doctor where status='1'";
							$result = mysqli_query($conn, $query);
							while ($row = mysqli_fetch_assoc($result)) {
							 echo "<tr>";
							 echo "<td class='table-width'>".$row['name']."</td>";
							 echo "<td class='table-width'>".$row['spec']."</td>";
							 echo "<td class='table-width'>".$row['contact']."</td>";
							 echo "<td class='table-width'>".$row['email']."</td>";
							 echo "<td class='table-width'>".$row['password']."</td>";
							 echo "<td class='table-width'>".$row['lic']."</td>";
							 echo "<td> <a href='doctor/doc_delete.php?id=".$row['did']."' class='button cancel'>Delete</a></td>";
							 echo "</tr>";
							}
						?>
	</table>
	<!-- finished fetching table rows -->

</div>

<!-- doctor table end -->