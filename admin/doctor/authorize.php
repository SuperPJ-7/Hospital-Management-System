<?php
    @session_start();
    include_once ('../../dbconfig.php');
	if(!isset($_SESSION['username']) || $_SESSION['userid']!=1){
		header('location:../index.php');
        exit;
	}

?>