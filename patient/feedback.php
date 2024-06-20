<?php    
    include('authorize.php');
    if(!isset($_GET['id'])){
        header('location:prescriptions.php');
    }
    if($_GET['del']==1){
        $delQuery = 'Delete from prescriptionfeedback where pid='.$_GET["id"];
        $row = mysqli_query($conn,$delQuery);
        if($row>0){
           header('location:patient.php');
           die();
        }
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
<nav>
		<div class="nav">
			<div class="logo">
				Hospital Management System
			</div>
			<div class="profile">
				
				<div class="profile-icon" id="profile-icon">
					<span><?php echo $_SESSION['username']; ?></span>
					<img src="../assets/images/user.png">
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
            <h2>Feedback</h2>
            <form action="#" method="POST" class="form">
                <label for="feedback">Feedback</label>
                <?php
                    $pid = $_GET['id'];
                    $query = "Select *from prescriptionfeedback where pid='$pid'";
                    $data = mysqli_query($conn,$query);
                    $result = mysqli_fetch_assoc($data);
                    $rows = mysqli_num_rows($data);
                    if($rows>0){

                        echo '<textarea class="textarea" name="feedback"  required>'.$result["txt"].'</textarea><br>
                        <button type="submit" class="button" name="submit">Submit</button>';
                    }
                    else{
                        echo '<textarea class="textarea" name="feedback" required></textarea><br>
                        <button type="submit" class="button" name="submit">Submit</button>'; 
                    }
                 ?>

            </form>
        </div></center>
    </main>
    <script src='assets/js/script.js'></script>
    
</body>
</html>

<?php    

    if(isset($_POST['submit'])){
        if(isset($_GET['did'])){
            $did = $_GET['did'];
            $patient_id = $_GET['pid'];
        }
        $pid = $_GET['id'];        
        $feedback = $_POST['feedback'];
        $date = date('Y-m-d H-i-s');
        // echo $pid.' '.$did.' '.$diagnosis.' '.$medication.''.$dosage.' '.$feedback;
        // echo $date;
        if( $feedback!='' ){
            try{
                $fbQuery = "INSERT INTO prescriptionfeedback(pid,patient_id,doctor_id,txt,date)
                values('$pid','$patient_id','$did','$feedback','$date')";
               
                if($rows>0){
                    $fid = $result['fid'];
                    $fbQuery = "Update prescriptionfeedback set txt = '$feedback' where fid='$fid'";
                }
                echo "<br>".$fbQuery."<br>";
                $rowAffected = mysqli_query($conn,$fbQuery);
                if($rowAffected>0){
                    echo "<script>
                        alert('Feedback added successfully');
                        window.location.href='patient.php';
                    </script>";
                }
                else{
                    echo "<script>
                        alert('Feedback could not be added');
                        window.location.href='patient.php';
                    </script>";
                
                }
            }
            catch(Exception $e){
                $errorMsg = $e->getMessage();
                echo "<script>
                        alert('SQL Exception occurred'.$errorMsg);
                        window.location.href='patient.php';
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
    






