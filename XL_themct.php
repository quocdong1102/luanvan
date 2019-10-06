<?php   
include("connect.php");
if(isset($_POST['submit'])){
  // echo "string";
  $ct_dokho = $_POST['ct_dokho'];
  $ct_khauphanan = $_POST['ct_khauphanan'];
  $ct_tgthuchien = $_POST['ct_tgthuchien'];
  $ct_nguyenlieu = $_POST['ct_nguyenlieu'];
  $number_counter_cachlam =  $_POST['number_counter'];
  $target_dir = "images/";

  // move_uploaded_file($_FILES['ma_hinhanh']['tmp_name'],$target_dir.$name);
  // $arrCachLam = array();
  for ($i=1; $i <= $number_counter_cachlam ; $i++) { 
    $arrCachLam[$i-1]['noidung'] =  $_POST['ct_cachlam_'.$i];
    $target_file = $target_dir . basename($_FILES["ct_hinhanh_".$i]["name"]);
    $extension = pathinfo($_FILES["ct_hinhanh_".$i]["name"], PATHINFO_EXTENSION);
    $newname = md5(time().$i).'.'.$extension; 
    move_uploaded_file($_FILES["ct_hinhanh_".$i]['tmp_name'],$target_dir.$newname); 
    $arrCachLam[$i-1]['hinhanh'] = $target_dir.$newname;
  }
  

  foreach ($arrCachLam as $key => $value) {
    echo $value['hinhanh'].'<br>';  
  }
}