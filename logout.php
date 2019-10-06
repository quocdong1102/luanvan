<?php
Error_reporting(E_ALL & ~ E_NOTICE);
session_start();
include('connect.php');
if(isset($_SESSION['taikhoan'])){
	unset($_SESSION['taikhoan']);
	$taikhoan=$_SESSION['taikhoan'];
	header("location:login.php");
}else{
	header("location:login.php");
}
?>
