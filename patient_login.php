<?php
session_start();
if (isset($_SESSION["username"]) && $_SESSION['userid']==3){
    header('location:patient.php');

}
include ('dbconfig.php');


if(isset($_POST['submit'])){
    
    $email = $_POST['email'];
    $password = $_POST['password'];
    if($email != '' && $password != ''){
        $query = "SELECT *FROM patient WHERE email='$email' and password='$password' and is_deleted=FALSE";
        $result = mysqli_query($conn,$query);
        $row = mysqli_num_rows($result);
        $resultdata = mysqli_fetch_assoc($result);
        $pid = $resultdata['pid'];
        if($row>0){
            if(!isset($_SESSION['username'])){
                $_SESSION['username'] = $resultdata['name'];
                $_SESSION['password'] = $password;
                $_SESSION['patient-id'] = $resultdata['pid'];
                $_SESSION['userid'] = 3;
            }
           header("location:patient.php?id=$pid");
        }
        else{
            echo "<script>alert('invalid username or password');
            location.href='index.php';
            </script>";        
            
        }
    }
    else{
        echo "<script>alert('all fields must be provided');
        window.location.href='index.php';
        </script>";
    }

}


?>