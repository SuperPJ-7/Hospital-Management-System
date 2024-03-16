<?php
include 'dbconfig.php';
?>
<div id="prescription" class="content hidden">
			
<!-- prescription table start -->
<div class="table-container" id="prescription-table">
    <table cellspacing="0" class="table">
        <tr>							
            <th class="table-width">Prescription id</th>
            <th class="table-width">Patient id</th>
            <th class="table-width">Patient name</th>
            <th class="table-width">Doctor id</th>
            <th class="table-width">Doctor name</th>
            <th class="table-width">Medication</th>
            <th class="table-width">Dosage</th>
            <th class="table-width">Frequeny</th>
            <th class="table-width">Date</th>
        <tr>
            <!-- fetching table rows -->
        <?php
            $query = "SELECT pres_id,patient_id,patient.name as pname,doctor_id,doctor.name as dname,medication,dosage,frequency,date from prescription,patient,doctor where patient_id=pid and doctor_id=did";
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
             echo "<tr>";
             echo "<td class='table-width'>".$row['pres_id']."</td>";
             echo "<td class='table-width'>".$row['patient_id']."</td>";
             echo "<td class='table-width'>".$row['pname']."</td>";
             echo "<td class='table-width'>".$row['doctor_id']."</td>";
             echo "<td class='table-width'>".$row['dname']."</td>";
             echo "<td class='table-width'>".$row['medication']."</td>";
             echo "<td class='table-width'>".$row['dosage']."</td>";
             echo "<td class='table-width'>".$row['frequency']."</td>";
             echo "<td class='table-width'>".$row['date']."</td>";
           
            }
        ?>
    </table>
    <!-- finished fetching table rows -->
    
</div>

<!-- prescription table end -->
</div>



