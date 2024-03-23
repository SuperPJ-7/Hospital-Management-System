<?php
include ('dbconfig.php');
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $query = "update doctor set apt_status='0' where $did='$id'";
    $result = mysqli_query($conn, $query);
    if ($result > 0) {
        echo "<script>
		alert('Record deleted successfully');
        location.href = 'admin.php'
		</script>";
    }
    else{
        echo "Couldn't delete record ".mysqli_error($conn);
    }
}
?>
