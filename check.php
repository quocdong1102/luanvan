<?php
   function kiemtra($sql,$result)
   {
   	global $con;
   	if(!$result)
{
   die("{$sql} \n<br/> MYSQL error:".mysqli_error($con));
}
    
}
?>