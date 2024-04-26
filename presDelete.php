

<?php
    
    include ('dbconfig.php');
    if(isset($_GET['id'])){
        $pres_id = $_GET['id'];
        $delQuery = "DELETE FROM prescription where pres_id = '$pres_id'";
        $rows = mysqli_query($conn,$delQuery);
        if($rows>0){
            echo "<script>
                alert('prescription deleted successfully');
                window.location.href='doctor.php';
            </script>";
        }
        else{
            echo "<script>
                alert('prescription could not be  deleted');
                window.location.href='doctor.php';
            </script>";
        }
    }
?>
