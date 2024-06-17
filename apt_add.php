<?php
    session_start();
    include 'dbconfig.php';
    echo "we are heredf";
    if(isset($_POST['submit']))
    {
       
        $spec = $_POST['spec'];
        $did = $_POST['doctor'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        
        $pid = $_SESSION['patient-id'];
        $datetime = date('Y-m-d');
        
        if($spec != '' && $did != '' && $date != '' && $time != ''){
            if($date<=$datetime){
                echo "<script>alert('Invalid date');
                    window.location.href='patient.php';
                </script>";
                die();
            }
            $query = "INSERT INTO appointment(patient_id,doctor_id,apt_date,apt_time,apt_status) values('$pid','$did','$date','$time','3')";
            $row = mysqli_query($conn,$query);
            if($row>0){
                echo "<script>alert('Appointment added succesfully!!!');
                    window.location.href='patient.php';
                </script>";
                
            }
            else{
                echo "<script>alert('Appointment could not be added!!!')";
                echo 'window.location.href="patient.php';
               echo " </script>";
            }
        }
        else{
            
            echo "<script>
                alert('all fields are required');
                window.location.href='patient.php';
            </script>";
        }

    }


