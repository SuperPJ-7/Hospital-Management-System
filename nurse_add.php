<?php
include('dbconfig.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    
    if ($name != '' && $email != '' && $contact != '' && $dob!='' && $gender!='') {
        $pattern = '/^[a-zA-Z]+\s[a-zA-Z]+$/';
            if(!preg_match($pattern,$name)){
                echo "<script>
                alert('Invalid name');
                location.href = 'admin.php';
            </script>";
                die();
            }
            $docadd_query = "INSERT INTO nurse(name,email,contact,dob,gender) VALUES('$name','$email','$contact','$dob','$gender')";
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
