<?php
include('authorize.php');
?>
//apt booking section doctor load
<?php
$spec = $_POST['status'];
$query = "SELECT name,did from doctor where spec='$spec' and status='1'";
echo $query;
$result = mysqli_query($conn,$query);


    echo "<option value=''>Select Doctor</option>";
    while($data = mysqli_fetch_assoc($result)){
        $name = $data['name'];
        $did = $data['did'];
        echo "<option value='$did'>".$name."</option>";
    }




?>