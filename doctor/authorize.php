<?php 
    @session_start();
    require_once ('../dbconfig.php');
    if(!isset($_SESSION['username']) || $_SESSION['userid']!=2){
        header('location:../index.php');
        exit;
    }
?>