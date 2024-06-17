<?php
    session_start();
    include ('../dbconfig.php');
?>

<table cellspacing="0" class="table">
        <tr>							
            <th class="table-width num">Prescription id</th>
            <th class="table-width num">Patient id</th>
            <th class="table-width">Patient name</th>
            <th class="table-width num">Doctor id</th>
            <th class="table-width">Doctor name</th>
            <th class="table-width">Medication</th>
            <th class="table-width">Dosage</th>
            <th class="table-width">Frequeny</th>
            <th class="">Date</th>
        <tr>
		<!-- fetching table rows -->
		<?php	
            @$pid = $_POST['pid'];
            $query = "SELECT pres_id,patient_id,patient.name as pname,doctor_id,doctor.name as dname,medication,dosage,frequency,date from prescription,patient,doctor  WHERE
            patient_id=pid and doctor_id=did and pres_id='$pid'";
            if($pid==''){
                $query = "SELECT pres_id,patient_id,patient.name as pname,doctor_id,doctor.name as dname,medication,dosage,frequency,date from prescription,patient,doctor where patient_id=pid and doctor_id=did";
            }
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td class='table-width num'>".$row['pres_id']."</td>";
                echo "<td class='table-width num'>".$row['patient_id']."</td>";
                echo "<td class='table-width'>".$row['pname']."</td>";
                echo "<td class='table-width num'>".$row['doctor_id']."</td>";
                echo "<td class='table-width'>".$row['dname']."</td>";
                echo "<td class='table-width'>".$row['medication']."</td>";
                echo "<td class='table-width'>".$row['dosage']."</td>";
                echo "<td class='table-width'>".$row['frequency']."</td>";
                echo "<td class=''>".$row['date']."</td>";
              
               }
            
            
            ?>
		
</table>
<!-- finished fetching table rows -->