<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('location:index.php');
    }
    if(!isset($_GET['pid']) && !isset($_GET['aid'])){
        header('location:doctor.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
    <link rel="stylesheet" type="text/css" href="assets/doc_style.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <style>
    body {
			background: white;
			color: black;
		}

		.nav {
			background: linear-gradient(to right, #1e48a3, #5ba5ea);
		}


    </style>
</head>
<body>
<nav>
		<div class="nav">
			<div class="logo">
				Hospital Management System
			</div>
			<div class="profile">
				
				<div class="profile-icon" id="profile-icon">
					<span><?php echo $_SESSION['username']; ?></span>
					<img src="assets/images/user.png">
				</div>
				<div id="dropdown">
					<div class="logout-container">
					<a href="logout.php">Log out</a>
					</div>
				</div>
			</div>

	</nav>
    <main class="main">
        <center><div class="form-container">
            <h2>Prescribe</h2>
            <form action="#" method="POST" class="form">
                <label for="Diagnosis">Diagnosis</label>
                <textarea class="textarea" name="diagnosis" rows="5" cols="200" required></textarea><br>
                <label for="medication">Medication</label>
                <textarea class="textarea" name="medication" required></textarea><br>
                <label for ="dosage">Dosage</label>
                <textarea class="textarea" name="dosage" required></textarea><br>
                <label for="frequency">Frequency</label>
                <textarea class="textarea" name="frequency" required></textarea><br>
                <button type="submit" class="button" name="submit">Prescribe</button>
            </form>
        </div></center>
    </main>
    <script src='assets/script.js'></script>
    
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        include('dbconfig.php');
        $pid = $_GET['pid'];
        $aid = $_GET['aid'];
        $did = $_SESSION['doctor-id'];
        $diagnosis = $_POST['diagnosis'];
        $medication = $_POST['medication'];
        $dosage = $_POST['dosage'];
        $frequency = $_POST['frequency'];
        $date = date('Y-m-d');
        // echo $pid.' '.$did.' '.$diagnosis.' '.$medication.''.$dosage.' '.$frequency;
        // echo $date;
        if($diagnosis!='' && $medication!='' && $dosage!='' && $frequency!=''){
            try{
                
                $insertQuery = "INSERT INTO prescription(patient_id,doctor_id,medication,dosage,frequency,date,diagnosis)
                values('$pid','$did','$medication','$dosage','$frequency','$date','$diagnosis')";
                $rowAffected = mysqli_query($conn,$insertQuery);
                if($rowAffected>0){
                    $updateQuery = "Update appointment set apt_status='4' where aid='$aid'";
                    $rows = mysqli_query($conn,$updateQuery);
                    
                    echo "<script>
                        alert('Prescription added successfully');
                        window.location.href='doctor.php';
                    </script>";
                }
                else{
                    echo "<script>
                        alert('Prescription could not be added');
                        window.location.href='doctor.php';
                    </script>";
                }
            }
            catch(Exception $e){
                $errorMsg = $e->getMessage();
                echo "<script>
                        alert('SQL Exception occurred'.$errorMsg);
                        window.location.href='doctor.php';
                    </script>";
            }
        }
        else{
            echo "<script>
                        alert('All fields must be included');
                        
                    </script>";
        }
    }
?>
    






