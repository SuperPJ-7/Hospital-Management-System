<?php
include('dbconfig.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    // $password = $_POST['password'];
    // $confirm = $_POST['confirm'];
    $contact = $_POST['contact'];
    
    if ($name != '' && $email != '' && $contact != '' ) {
            $docadd_query = "INSERT INTO nurse(name,email,contact) VALUES('$name','$email','$contact')";
            $rows = mysqli_query($conn, $docadd_query);
            if ($rows > 0) {
                echo "<script>
                    alert('Nurse added successfully');
                    location.href = 'admin.php';
                </script>";
            }
        
    } else {
        echo "<script>
                    alert('All fields must be provided');
                    location.href = 'admin.php';
                </script>";
    }
}
