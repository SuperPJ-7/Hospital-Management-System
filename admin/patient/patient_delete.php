<?php
include ('../doctor/authorize.php');
if (isset($_GET['id'])) {
    
    $id = $_GET['id'];
    $query = "update patient set is_deleted=TRUE WHERE pid='$id'";
    $result = mysqli_query($conn, $query);
    if ($result > 0) {
        echo "<script>
		alert('Record deleted successfully');
        location.href = '../admin.php'
		</script>";
    }
    else{
        echo "Couldn't delete record ".mysqli_error($conn);
    }
}
?>
