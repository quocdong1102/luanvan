<?php

class classConnect
{
    function mysqlConnect()
    {
        try
        {
            $PDOobjdata = new PDO(
                'mysql:host=localhost; dbname=hnag',
                'root',
                '',
                array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
            );
            return $PDOobjdata;
        }
        catch (PDOException $e)
        {
            die('Connection failed: ' . $e->getMessage());
        }
    }
}
class Models
{
    public $connect;

    function __construct()
    {
        $this->connect = new classConnect();
    }

    public function SqlQueryOutputResult($Query, $parameterValues)
    {
        $PDOobjdata = $this->connect->mysqlConnect();
        $PDOobjdata->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
        $result = $PDOobjdata->prepare( $Query );
        if($result->execute($parameterValues) <> FALSE){
            return $result;
        } else {
            if ($result->errorCode(  )<>'00000') {
                die("<label style=color:#FF0000>Báo lỗi: ".implode(': ',$result->errorInfo(  ))."<label><br><br>");
                return false;
            }
        }
    }
    /*
    ** Query mysql and input values
    **
    */
    public function SqlQueryInputResult($Query, $parameterValues){
        $PDOobjdata = $this->connect->mysqlConnect();
        $PDOobjdata->setAttribute(PDO::ATTR_EMULATE_PREPARES, 1);
        $result = $PDOobjdata->prepare( $Query );
        if($result->execute($parameterValues) <> FALSE) {
            $PDOobjdata->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
            return true;
        } else {
            if ($result->errorCode(  )<>'00000') {
                $PDOobjdata->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
                die("<label style=color:#FF0000>Báo lỗi: ".implode(': ',$result->errorInfo(  ))."<label><br><br>");
                return false;
            }
        }
    }

    /*
    ** Query mysql and return last insert id
    **
    */
    public function last_insert_id($Query, $parameterValues){
        $PDOobjdata = $this->connect->mysqlConnect();
        $result = $PDOobjdata->prepare( $Query );
        if($result->execute($parameterValues) <> FALSE){
            return $PDOobjdata->lastInsertId();
        } else {
            if ($result->errorCode(  )<>'00000') {
                die("<label style=color:#FF0000>Báo lỗi: ".implode(': ',$result->errorInfo(  ))."<label><br><br>");
                return 0;
            }
        }
    }

    /*
    ** Query mysql and return row count
    **
    */
    public function row_count($Query, $parameterValues){

        $result = $this->SqlQueryOutputResult($Query, array($parameterValues));
        return $result->rowCount();
    }

    /*
    ** Query mysql and return row count
    **
    */
    public function run_sql($Query){
        $PDOobjdata = $this->connect->mysqlConnect();
        $result = $PDOobjdata->exec($Query);
        return $result;
    }

    /*
    ** Query mysql and return max id query
    ** @author: phan van tinh
    */
    public function maxid($table, $column){

        $sql = "select MAX(`$column`)+1 As `MaxId` from `$table`;";
        $result =  $this->SqlQueryOutputResult($sql, array(0));
        if($row = $result->fetch()){
            if($row["MaxId"] == 0)	return 1;
            else return $row["MaxId"];
        }
    }

    public function fix_quotes_dquotes($text)
    {
        $tmp = str_replace(array('\"', "\'"), array('"', "'"), $text);
        return str_replace(array('"', '\''), array('″', '′'), $tmp);
    }

    public function get_max_allowed_packet()
    {
        $result = $this->SqlQueryOutputResult("SHOW VARIABLES LIKE 'max_allowed_packet'", array());
        if ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            return intval($row['Value'] * 8 / 10);
        }
        else {
            return 0;
        }
    }
}