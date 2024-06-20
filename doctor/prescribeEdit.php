<?php
    include ('authorize.php');
    if(!isset($_GET['id'])){
        header('location:doctor.php');
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/doc_style.css">
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
    <?php include ('../assets/includes/navbar.php'); ?>
    <main class="main">
        <center><div class="form-container">
            <h2>Prescribe</h2>
            <!-- fetching previous information -->
            <?php
                $pres_id = $_GET['id'];
                $query = "SELECT * FROM prescription where pres_id = '$pres_id'";
                $result = mysqli_query($conn,$query);
                $data = mysqli_fetch_assoc($result);
            ?>
            <form action="#" method="POST" class="form">
                <label for="Diagnosis">Diagnosis</label>
                <textarea class="textarea" name="diagnosis" required><?php echo $data['diagnosis']; ?></textarea><br>
                <label for="medication">Medication</label>
                <textarea class="textarea" name="medication" required><?php echo $data['medication']; ?></textarea><br>
                <label for ="dosage">Dosage</label>
                <textarea class="textarea" name="dosage" required><?php echo $data['dosage']; ?></textarea><br>
                <label for="frequency">Frequency</label>
                <textarea class="textarea" name="frequency" required><?php echo $data['frequency']; ?></textarea><br>
                <button type="submit" class="button" name="submit">Update</button>
            </form>
        </div></center>
    </main>
    <script src='../assets/js/script.js'></script>
    
</body>
</html>

<?php
    if(isset($_POST['submit'])){
        
        $pid = $_GET['id'];
        
        $diagnosis = $_POST['diagnosis'];
        $medication = $_POST['medication'];
        $dosage = $_POST['dosage'];
        $frequency = $_POST['frequency'];
        $date = date('Y-m-d');
        // echo $pid.' '.$did.' '.$diagnosis.' '.$medication.''.$dosage.' '.$frequency;
        // echo $date;
        if($diagnosis!='' && $medication!='' && $dosage!='' && $frequency!=''){
            try{
                
                $updateQuery = "Update prescription set diagnosis='$diagnosis',medication='$medication',dosage='$dosage',frequency='$frequency',date='$date' where pres_id='$pid'";
                $rowAffected = mysqli_query($conn,$updateQuery);
                if($rowAffected>0){
                    
                    echo "<script>
                        alert('Prescription edited successfully');
                        window.location.href='doctor.php';
                    </script>";
                }
                else{
                    echo "<script>
                        alert('Prescription could not be edited');
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
                        alert('All fields are required');
                        
                    </script>";
        }
    }
?>
    






