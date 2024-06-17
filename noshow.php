<?php

    if(isset($_GET['id'])){
        include 'dbconfig.php';
        $aid= $_GET['id'];
        try{

            $query = "UPDATE appointment SET apt_status='5' where aid='$aid'";
            $result = mysqli_query($conn,$query);
            if($result>0){
                header('location:doctor.php');
            }
            else{
                echo "Couldn't perform action you requested";
            }
        }
        catch(Exception $e){
            $errormsg = $e->getMessage();
            echo "SQLException Occurred =>".$errormsg;
        }
    }
?>