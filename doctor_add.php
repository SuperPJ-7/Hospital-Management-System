<?php
include('dbconfig.php');
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $spec = $_POST['specialization'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $license = $_POST['license'];
    //echo $name . '' . $email . '' . $password . '' . $confirm . '' . $spec . '' . $contact . '' . $license . '';
    if ($name != '' && $email != '' && $password != '' && $confirm != '' && $spec != '' && $contact != '' && $address!='' && $license != '') {
        if ($password != $confirm) {
            echo "<script>
                    alert('both passwords must match');
                    location.href = 'admin.php';
                </script>";
        } else {
            try{
            $docadd_query = "INSERT INTO doctor(name,spec,contact,email,lic,password,address) VALUES('$name','$spec','$contact','$email','$license','$password','$address')";
            $rows = mysqli_query($conn, $docadd_query);
                if ($rows > 0) {
                    echo "<script>
                        alert('Doctor added successfully');
                        location.href = 'admin.php';
                    </script>";
                }
            }
            catch(Exception $e){
               
                echo "<script>alert('Recorded could not be added');
                location.href='admin.php';
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
