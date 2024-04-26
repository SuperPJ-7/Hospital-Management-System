<?php
    
    include ('dbconfig.php');
    $pid = $_SESSION['patient-id'];
    $query = "SELECT *from patient where pid='$pid'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
?>
<p>User info</p>

<div class="info">
    <div class="leftcard">
        <div class="image">
            <img src="assets/images/user.png" alt="patient image">
        </div>
        <div class="contact">
            <div>Name:<?php echo $_SESSION['username']; ?></div>
            <div><i class="fa-solid fa-location-crosshairs" style="color: #3204be;"></i>
                Address:<?php echo " ". /*$data['address'];*/"Address"; ?>            
            </div>
            <div>
                <button class="button">Edit</button>
                <button class="button">Reset</button>
            </div>

        </div>
    </div>
    <div class="rightcard">
        <p><span>Profile</span></p>
        <div class="row">
            <div><span>Name</span>
                <span><?php echo $data['name']; ?></span>
            </div>
            <div>
                <span>Email</span>
                <span><?php echo $data['email']; ?></span>
            </div>
            <div>
                <span>DOB</span>
                <span><?php echo $data['dob']; ?></span>
            </div>
            <div>
                <span>Gender</span>
                <span><?php echo $data['gender']; ?></span>
            </div>
            <div>
                <span>Contact</span>
                <span><?php echo $data['cont']; ?></span>
            </div>
        </div>
    
    </div>
    <script src="https://kit.fontawesome.com/a865739a53.js" crossorigin="anonymous"></script>
</div>