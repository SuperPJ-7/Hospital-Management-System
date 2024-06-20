<?php
session_start();
if(isset($_SESSION['userid'])){
    if($_SESSION['userid']==1){
        header('location:admin.php');
        exit;
    }
    else if($_SESSION['userid']==2){
        header('location:doctor.php');
        exit;
    }
    else if($_SESSION['userid']==3){
        header('location:patient.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Management System</title>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/contactForm.css">

   
    
</head>
<body>
    <nav>
        <div class="nav">
            <div class="logo">
                Hospital Management System
            </div>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="services.php">About us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container contact-form" >
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post" action="#">
                <h3>Drop Us a Message</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" onkeydown="return alphaOnly(event);" required/>
                        </div>
                        <div class="form-group">
                            <input type="email" name="txtEmail" class="form-control" placeholder="Your Email *" required />
                        </div>
                        <div class="form-group">
                            <input type="tel" name="txtPhone" class="form-control" placeholder="Your Phone Number *" minlength="10" maxlength="10" required />
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <div class="form-group" >
                            <textarea name="txtMsg" class="form-control" placeholder="Your Message *" style="width: 100%; height: 150px;" required></textarea>
                        </div>
                    </div>
                   
                    <div class="form-group" >
                    <center>
                            <input type="submit" name="Submit" class="btnContact"   value="Send Message" />
                    </center>
                    </div>
                </div>
            </form>
</div>
    
</body>
</html>
<?php
include ('dbconfig.php');
if(isset($_POST['Submit'])){
    $name = $_POST['txtName'];
    $email = $_POST['txtEmail'];
    $phone = $_POST['txtPhone'];
    $msg = $_POST['txtMsg'];
    
    if($name!='' && $email!='' && $phone!='' &&  $msg!=''){
        $query = "Insert into contact values('$email','$name','$phone','$msg')";
      
        $row = mysqli_query($conn,$query);
        if($row>0){
            header('location:index.php');
        }
    }
    else{
        echo "All fields are necessary";
    }
}

?>