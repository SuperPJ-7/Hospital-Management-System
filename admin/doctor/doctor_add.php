<?php
include('authorize.php');
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
    $matchLicense = "Select did from doctor where lic='$license'";
    $count = mysqli_num_rows(mysqli_query($conn,$matchLicense));
    echo $count;
    if($count == 1){
        $updateQuery = "Update doctor set status=TRUE where lic='$license'";
        $result = mysqli_query($conn,$updateQuery);
        if($result>0){
            echo "<script>
                        alert('Doctor added successfully');
                        location.href = '../admin.php';
                </script>";
            die();
        }
    }
    
    if ($name != '' && $email != '' && $password != '' && $confirm != '' && $spec != '' && $contact != '' && $address!='' && $license != '') {
        if ($password != $confirm) {
            echo "<script>
                    alert('both passwords must match');
                    location.href = '../admin.php';
                </script>";
        } else {
            $pattern = '/^[a-zA-Z]+\s[a-zA-Z]+$/';
            if(!preg_match($pattern,$name)){
                echo "<script>
                alert('Invalid name');
                location.href = '../admin.php';
            </script>";
                die();
            }
            $pattern = '/^[9]\d{9}$/';

            if(!preg_match($pattern,$contact)){
                echo "<script>
                alert('Invalid phone');
                location.href = '../admin.php';
            </script>";
                die();
    
            }
            try{

            $docadd_query = "INSERT INTO doctor(name,spec,contact,email,lic,password,address,status) VALUES('$name','$spec','$contact','$email','$license','$password','$address',TRUE)";
            $rows = mysqli_query($conn, $docadd_query);
                if ($rows > 0) {
                    echo "<script>
                        alert('Doctor added successfully');
                        location.href = '../admin.php';
                    </script>";
                }
            }
            catch(Exception $e){
               
                echo "<script>alert('Recorded could not be added');
                location.href='../admin.php';
            </script>";
            }
            
        }
    } else {
        echo "<script>
                    alert('All fields must be provided');
                    location.href = '../admin.php';
                </script>";
    }
}
