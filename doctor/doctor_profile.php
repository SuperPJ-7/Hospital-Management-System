<?php    
    include ('authorize.php');
    $did = $_SESSION['doctor-id'];
    $query = "SELECT *from doctor where did='$did'";
    $result = mysqli_query($conn,$query);
    $data = mysqli_fetch_assoc($result);
?>
<p>User info</p>

<div class="info">
    <div class="leftcard">
        <div class="image">
            <img src="../assets/images/doctor.png" alt="doctor image">
        </div>
        <div class="contact">
            <div>Name:<?php echo $_SESSION['username']; ?></div>
            <div><i class="fa-solid fa-location-crosshairs" style="color: #3204be;"></i>
                Address:<?php echo " ". $data['address']; ?>            
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
            <div><span>Username</span>
                <span><?php echo $data['name']; ?></span>
            </div>
            <div>
                <span>Email</span>
                <span><?php echo $data['email']; ?></span>
            </div>
            <div>
                <span>License</span>
                <span><?php echo $data['lic']; ?></span>
            </div>
            <div>
                <span>Specialization</span>
                <span><?php echo $data['spec']; ?></span>
            </div>
            <div>
                <span>Status</span>
                <span><?php echo ($data['status']==1)?'Active':'Inactive'; ?></span>
            </div>
        </div>
    
    </div>
    <script src="https://kit.fontawesome.com/a865739a53.js" crossorigin="anonymous"></script>
</div>