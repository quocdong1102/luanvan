<?php
global $con;
$con = mysqli_connect("localhost","root","","hnag");
   mysqli_set_charset($con, 'UTF8');
  if (!$con) {
    echo 'Failed to connect to Mysql : '.mysqli_connect_error();
  }else{
    
  }
                 
 ?>
