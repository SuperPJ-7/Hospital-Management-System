<?php
include 'dbconfig.php';
?>
<div class="search">

<input type="number" id="pres-search" class="input" min="1" placeholder="Enter patient-id">
<button class="button" onclick="prescriptionSearch()">Search</button>
</div>
			
<!-- prescription table start -->
<div class="table-container" id="prescription-table">
    <table cellspacing="0" class="table">
        <tr>							
            <th class="table-width num">Prescription id</th>
            <th class="table-width num">Patient id</th>
            <th class="table-width">Patient name</th>
            <th class="table-width">Diagnosis</th>
            <th class="table-width">Medication</th>
            <th class="table-width">Dosage</th>
            <th class="table-width">Frequeny</th>
            <th class="table-width">Date</th>
            <th>Action</th>
        <tr>
            <!-- fetching table rows -->
        <?php
            $did = $_SESSION['doctor-id'];
            $query = "SELECT pres_id,patient_id,patient.name as pname,diagnosis,medication,dosage,frequency,date from prescription,patient where patient_id=pid and doctor_id='$did'";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
             echo "<tr>";
             echo "<td class='table-width num'>".$row['pres_id']."</td>";
             echo "<td class='table-width num'>".$row['patient_id']."</td>";
             echo "<td class='table-width'>".$row['pname']."</td>";
             echo "<td class='table-width'>".$row['diagnosis']."</td>";
             echo "<td class='table-width'>".$row['medication']."</td>";
             echo "<td class='table-width'>".$row['dosage']."</td>";
             echo "<td class='table-width'>".$row['frequency']."</td>";
             echo "<td class='table-width'>".$row['date']."</td>";
             echo "<td class='table-width'> <a href='prescribeEdit.php?id=" . $row['pres_id']. "' class='button'>Edit</a>
             <a href='presDelete.php?id=" . $row['pres_id'] . "' class='button cancel'>Delete</a></td>";
            }
        ?>
    </table>
    <!-- finished fetching table rows -->
    
</div>

<!-- prescription table end -->
<!-- delete prescription -->




