<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/userValidator/config.php';


class db{

    public $dbh;
    static private $connection;

    private function __construct() {
        $config=new config();
        $dns=$config->getDns();
        $user=$config->getDbUser();
        $password=$config->getDbPassword();
        $this->dbh=new PDO($dns,$user,$password);
        $this->dbh->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
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