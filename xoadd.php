<?php
    Error_reporting(E_ALL & ~ E_NOTICE);
    session_start();
    include("connect.php");

    if(isset($_SESSION["taikhoan"])){
	$id=isset($_GET['id']) ? $_GET['id']:'$id';
	
	$sql = "DELETE FROM loai_dinh_duong WHERE loai_dinh_duong.loaidd_id='$id' ";
	$result = mysqli_query($con, $sql);
	if($result){
		header("location:dsdinhduong.php");
	}
	}else{
	    header("location:dsdinhduong.php");
	}	
?>