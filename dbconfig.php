<?php
$server = "localhost";
$dbname = "myhms";
$un = "root";
$pw = "";
$conn = new mysqli($server,$un,$pw,$dbname);
if(!$conn){
    die("Connection failed: ".$conn->connect_error);
}



?>