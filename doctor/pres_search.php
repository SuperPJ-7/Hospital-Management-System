<?php
include ('authorize.php');
?>
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
        @$pid = $_POST['key'];
        $query = "select pres_id,patient_id,patient.name as pname,medication,dosage,frequency,date,diagnosis from prescription,patient WHERE
        patient_id=pid and patient_id='$pid' and doctor_id='$did';";
        if($pid==''){
            $query = "select pres_id,patient_id,patient.name as pname,medication,dosage,frequency,date,diagnosis from prescription,patient WHERE
            patient_id=pid and doctor_id='$did'";
        }
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
            echo "<td class='table-width'> <a href='prescribeEdit.php?id=" . $row['pres_id']. "' class='button'>Edit</a></td>";
           }
        
        
        ?>
</table>