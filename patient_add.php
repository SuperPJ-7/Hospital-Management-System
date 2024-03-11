<?php
include('dbconfig.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $dob = $_POST['dob'];
    echo $name.''.$email.''.$password.''.$confirm.''.$contact.''.$dob.'';
    if ($name != '' && $email != '' && $password != '' && $confirm != '' && $dob != '' && $contact != '' && $gender != '') {
        if ($password != $confirm) {
            echo "<script>
                    alert('both passwords must match');
                    location.href = 'admin.php';
                </script>";
        } else {
            $patadd_query = "INSERT INTO patient(name,email,password,cont,dob,gender) VALUES('$name','$email','$password','$contact','$dob','$gender')";
            $rows = mysqli_query($conn, $patadd_query);
            if ($rows > 0) {
                echo "<script>
                    alert('Patient added successfully');
                    location.href = 'admin.php';
                </script>";
            }
        }
    } else {
        echo "<script>
                    alert('All fields must be provided');
                    location.href = 'admin.php';
                </script>";
    }
}
