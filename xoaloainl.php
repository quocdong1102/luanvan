<?php
    Error_reporting(E_ALL & ~ E_NOTICE);
    session_start();
    include("connect.php");

    if(isset($_SESSION["taikhoan"])){
	$id=isset($_GET['id']) ? $_GET['id']:'$id';
	
	$sql = "DELETE FROM loai_nguyen_lieu WHERE loai_nguyen_lieu.loainl_id='$id' ";
	$result = mysqli_query($con, $sql);
	if($result){
		header("location:loainl.php");
	}
	}else{
	    header("location:loainl.php");
	}	
?>