<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/sunshine/config.php';

class db{

    static private $connection;

    public function __construct($dns,$user,$password)
    {
        if(!self::$connection){
            try{
                self::$connection=new PDO($dns,$user,$password);
            }catch(PDOException $e){

                die("pdo connection error:".$e->getMessage());
            }
        }
        return self::$connection;
    }

    public static  function getinstanse(){
        if(!isset(self::$connection)){
            $object=__CLASS__;
            self::$connection=new $object;

        }
        return self::$connection;
    }

    public function runQuery($statement)
    {
    	return self::$connection->query($statement);
    }
    public function prepareStatement($statement,$driver_options=false)
    {
        if(!$driver_options) $driver_options=array();
    	return self::$connection->prepare($statement, $driver_options);
    }
    public function prepareStatementRegister($statement,$params)
    {
    }

    public function fetchAll($statement)
    {
        return self::$connection->query($statement)->fetchAll(PDO::FETCH_ASSOC);
    }
    public function renewToken()
    {
        # code...
    }
    public function __tostring()
    {
        return "I apologize";
    }


}