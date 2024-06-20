<?php
include ('authorize.php');
echo "<script>";

    echo "let cn = confirm('Are you sure you want to confirm this appointment?');
    if(!cn){
        window.location.href='doctor.php';
    }";  
echo "</script>";
    if(isset($_GET['id'])){
        $aid= $_GET['id'];
        try{

            $query = "UPDATE appointment SET apt_status='0' where aid='$aid'";
            $result = mysqli_query($conn,$query);
            if($result>0){
                echo "<script>
                    alert('Appointment confirmed successfully');
                    window.location.href='doctor.php';
                </script>";
            }
            else{
                echo "<script>
                    alert('Appointment could not be confirmed');
                    window.location.href='doctor.php';
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