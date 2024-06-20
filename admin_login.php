<?php
session_start();
include ('dbconfig.php');
if (isset($_SESSION["username"]) && $_SESSION['userid']==1){    
    header('location:admin/admin.php');
    exit;    
}


if(isset($_POST['submit'])){    
    $username = $_POST['username'];
    $password = $_POST['password'];
    if($username != '' && $password != ''){
        $query = "SELECT username FROM admin WHERE username='$username' and password='$password'";
        $result = mysqli_query($conn,$query);
        $row = mysqli_num_rows($result);
        
        if($row>0){
            if(!isset($_SESSION['username'])){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['userid'] = 1;
            }
            // echo "<script>window.location.href='admin.php'</script>";
            header('location:admin/admin.php');
            exit;
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