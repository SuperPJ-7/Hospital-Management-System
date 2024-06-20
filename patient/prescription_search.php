<?php
include('authorize.php');
?>

<table cellspacing="0" class="table">
        <tr>							
            <th class="table-width num">Prescription id</th>
            <th class="table-width num">Doctor id</th>
            <th class="table-width">Doctor name</th>
            <th class="table-width">Diagnosis</th>
            <th class="table-width">Medication</th>
            <th class="table-width">Dosage</th>
            <th class="table-width">Frequeny</th>
            <th class="table-width">Date</th>
            <th>Feedback</th>
        <tr>
            <!-- fetching table rows -->
        <?php
            if(isset($_POST['key'])){
                $pres_id = $_POST['key'];
            }
            $pid = $_SESSION['patient-id'];
            $query = "SELECT pres_id,doctor_id,doctor.name as dname,diagnosis,medication,dosage,frequency,date from prescription,doctor where doctor_id=did and patient_id='$pid'";
            if($pres_id!=''){
                $query = "SELECT pres_id,doctor_id,doctor.name as dname,diagnosis,medication,dosage,frequency,date from prescription,doctor where doctor_id=did and patient_id='$pid' and pres_id='$pres_id'";
            }
            $result = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_assoc($result)) {
            $pres_id = $row['pres_id'];
             echo "<tr>";
             echo "<td class='table-width num'>".$row['pres_id']."</td>";
             echo "<td class='table-width num'>".$row['doctor_id']."</td>";
             echo "<td class='table-width'>".$row['dname']."</td>";
             echo "<td class='table-width'>".$row['diagnosis']."</td>";
             echo "<td class='table-width'>".$row['medication']."</td>";
             echo "<td class='table-width'>".$row['dosage']."</td>";
             echo "<td class='table-width'>".$row['frequency']."</td>";
             echo "<td class='table-width'>".$row['date']."</td>";
             $query = "Select fid from prescriptionfeedback where pid = '$pres_id'";
                $data = mysqli_query($conn,$query);
                $rows = mysqli_num_rows($data);
                if($rows>0){
                    echo "<td class='table-width'> <a href='feedback.php?id=" . $pres_id. "&del=0' class='button'>Edit</a>

                    <a href='feedback.php?id=" . $pres_id . "&del=1' class='button cancel'>Delete</a></td>";
                }
                else{
                    echo "<td class='table-width'> <a href='feedback.php?id=" . $pres_id. "&del=0&pid=".$pid."&did=".$row['doctor_id']."' class='button'>Add</a></td>";
                    
                }



             
            }
        ?>
    </table>