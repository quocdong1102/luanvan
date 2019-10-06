<?php

global $con;
include 'Models.php';
class MonAn extends Models
{

    private $ma_ten;
    private $ma_kcal;
    private $ma_hinhanh;
    public $dbObj;

    function __construct()
    {
        $this->dbObj = new Models();
    }
    public function createMonAnVungMien($ma_id, $vm_id)
    {
        $sql = 'INSERT INTO `monan_vungmien`(`ma_id`, `vm_id`) VALUES (?,?)';
        $result = $this->dbObj->SqlQueryInputResult($sql,array($ma_id,$vm_id));
        if($result > 0){
            return true;
        }
        else return false;
    }


    public function createMonAnMua($ma_id, $mua_id)
    {
        $sql = 'INSERT INTO `monan_mua`(`ma_id`, `mua_id`) VALUES (?,?)';
        $result = $this->dbObj->SqlQueryInputResult($sql,array($ma_id,$mua_id));
        if($result > 0){
            return true;
        }
        else return false;
    }

    public function createMonAnSucKhoe($ma_id, $sk_id)
    {
        $sql = 'INSERT INTO `monan_suckhoe`(`ma_id`, `sk_id`) VALUES (?,?)';
        $result = $this->dbObj->SqlQueryInputResult($sql,array($ma_id,$sk_id));
        if($result > 0){
            return true;
        }
        else return false;
    }

    public function createMonAnThoiDiem($ma_id, $td_id)
    {
        $sql = 'INSERT INTO `monan_thoidiem`(`ma_id`, `td_id`) VALUES (?,?)';
        $result = $this->dbObj->SqlQueryInputResult($sql,array($ma_id,$td_id));
        if($result > 0){
            return true;
        }
        else return false;
    }

    public function createMonAn($ma_ten, $ma_kcal, $loaima_id, $vm_id, $mua_id, $sk_id, $td_id ,$dotuoi_id, $ma_hinhanh)
    {
        $sql = 'INSERT INTO `mon_an`(`loaima_id`, `ma_ten`, `ma_kcal`, `dotuoi_id`, `ma_hinhanh`) VALUES (?,?,?,?,?)';
        $result = $this->dbObj->SqlQueryInputResult($sql,array($loaima_id,$ma_ten,$ma_kcal,$dotuoi_id, $ma_hinhanh));
        if($result > 0){
            $monAnIDMax = $this->dbObj->maxid('mon_an', 'ma_id');
            foreach ($vm_id as $item_vm_id){
                $result_vm = $this->createMonAnVungMien($monAnIDMax-1, $item_vm_id);
            }
            foreach ($mua_id as $item_mua_id){
                $result_mua = $this->createMonAnMua($monAnIDMax-1, $item_mua_id);
            }
            foreach ($sk_id as $item_mua_id){
                $result_mua = $this->createMonAnSucKhoe($monAnIDMax-1, $item_mua_id);
            }
            foreach ($td_id as $item_td_id){
                $result_mua = $this->createMonAnSucKhoe($monAnIDMax-1, $item_td_id);
            }
        }
        else return false;
    }





}