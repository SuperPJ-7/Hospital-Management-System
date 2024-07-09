<?php
session_start();
if (isset($_SESSION["username"]) && $_SESSION['userid']==2){
    header('location:doctor/doctor.php');
}
include ('dbconfig.php');


if(isset($_POST['submit'])){
    
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    if($email != '' && $password != ''){
        $query = "SELECT *FROM doctor WHERE email='$email' and password='$password' and status='1'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_num_rows($result);
        $resultdata = mysqli_fetch_assoc($result);
        if($row>0){
            if(!isset($_SESSION['username'])){
                $_SESSION['username'] = $resultdata['name'];
                $_SESSION['password'] = $password;
                $_SESSION['doctor-id'] = $resultdata['did'];
                $_SESSION['userid'] = 2;
            }
           header("location:doctor/doctor.php");
        }
        else{
            echo "<script>alert('invalid username or password');
            location.href='index.html';
            </script>";        
            
        }
    }
    else{
        echo "<script>alert('all fields must be provided');
        window.location.href='index.html';
        </script>";
    }

}


?>