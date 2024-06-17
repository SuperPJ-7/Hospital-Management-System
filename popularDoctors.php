<?php
include('dbconfig.php');
// Fetch doctor appointment data
$sql = "SELECT did, name, COUNT(aid) AS apt_count
        FROM doctor
        LEFT JOIN appointment  ON did = doctor_id where status='1'
        GROUP BY did, name
        ORDER BY apt_count DESC";

$result = mysqli_query($conn,$sql);


// Fetch total appointments count
$totalAppointmentsSql = "SELECT COUNT(aid) AS total_appointment FROM appointment";
$totalAppointmentsResult = $conn->query($totalAppointmentsSql);
$totalAppointmentsRow = $totalAppointmentsResult->fetch_assoc();
$total_appointments = $totalAppointmentsRow['total_appointment'];

$doctors = [];

if (mysqli_num_rows($result)>0) {
    while ($row = $result->fetch_assoc()) {
        $appointment_percentage = ($total_appointments > 0) ? ($row['apt_count'] / $total_appointments) * 100 : 0;
        $doctors[] = [
            'id' => $row['did'],
            'name' => $row['name'],
            'appointment_count' => $row['apt_count'],
            'appointment_percentage' => $appointment_percentage
        ];
    }
}


?>


    
 <div class="containerDoc mt-5">
        <h2>Popular Doctors</h2>
        <ul class="list-group">
            <?php foreach ($doctors as $doctor): ?>
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <span><?php echo htmlspecialchars($doctor['name'])." =>"; ?></span>
                    <span><?php echo $doctor['appointment_count']; ?> appointments</span>
                </div>
                <div class="progress mt-2">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $doctor['appointment_percentage']; ?>%;" aria-valuenow="<?php echo $doctor['appointment_percentage']; ?>" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
   