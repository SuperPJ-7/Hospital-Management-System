<?php
include('authorize.php');

echo "<script>";

    echo "let cn = confirm('Are you sure you want to cancel this appointment?');
    if(!cn){
        window.location.href='patient.php';
    }";  
echo "</script>";
    if(isset($_GET['id'])){        
        $aid= $_GET['id'];
        try{
            $query = "UPDATE appointment SET apt_status='2' where aid='$aid'";
            $result = mysqli_query($conn,$query);
            if($result>0){
                echo "<script>
                    alert('Appointment successfully cancelled');
                    window.location.href='patient.php';
                </script>";
            }
            else{
                echo "<script>
                    alert('Appointment could not be cancelled');
                    window.location.href='patient.php';
                </script>";
            }
        }
        catch(Exception $e){
            $errormsg = $e->getMessage();
            echo "<script>
                alert('SQL error occurred'.$errormsg);
            </script>";
        }
    }
?>