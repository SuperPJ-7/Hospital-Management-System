<?php include ('authorize.php'); ?>

<div class="appointment-container">
	<div class="form-container">
		<div>
			<h3>Create an Appointment</h3>
		</div>
		<form action="apt_add.php" class="form" id="apt-form" method="POST">
			<label for="specialization">Specialization</label>
			<select name="spec" onchange="filterApt(event,'../patient/doc_load.php','doc-select')" id="spec-select" class="input">
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
			<input type="submit" name="submit" class="button" value="Create new entry" </input>

		</form>

	</div>
</div>