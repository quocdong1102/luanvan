<?php
    Error_reporting(E_ALL & ~ E_NOTICE);
    session_start();
    include("connect.php");

    if(isset($_SESSION["taikhoan"])){
	$id=isset($_GET['id']) ? $_GET['id']:'$id';
	
	$sql = "DELETE FROM nguyen_lieu WHERE nguyen_lieu.nl_id='$id' ";
	$result = mysqli_query($con, $sql);
	if($result){
		header("location:dsnl.php");
	}
	}else{
	    header("location:dsnl.php");
	}	
?>