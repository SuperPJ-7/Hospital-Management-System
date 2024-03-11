<?php
include ('dbconfig.php');
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $query = "DELETE FROM doctor WHERE did=$id";
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
