<?php
include("connect.php");
include 'models/MonAn.php';
$modelMonAn = new MonAn();

$ma_ten = $_POST['ma_ten'];
$ma_kcal = $_POST['ma_kcal'];
$loaima_id = $_POST['loaima_id'];
if (empty($_POST['vm_id'])) {
    $vm_id = 1;
} else {
    $vm_id = $_POST['vm_id'];
}

if (empty($_POST['mua_id'])) {
    $mua_id = 1;
} else {
    $mua_id = $_POST['mua_id'];
}
if (empty($_POST['sk_id'])) {
    $sk_id = 1;
} else {
    $sk_id = $_POST['sk_id'];
}

$dotuoi_id = $_POST['dotuoi_id'];
if (empty($_POST['td_id'])) {
    $td_id = 1;
} else {
    $td_id = $_POST['td_id'];
}
$name = $_FILES['ma_hinhanh']['name'];
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["ma_hinhanh"]["name"]);
move_uploaded_file($_FILES['ma_hinhanh']['tmp_name'], $target_dir . $name);


$modelMonAn->createMonAn($ma_ten, $ma_kcal, $loaima_id, $vm_id, $mua_id, $sk_id, $td_id , $dotuoi_id, $target_file);


?>