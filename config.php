<?php
class config{
    public $dbUser='mors';
    public $dbPassword='';
    public $dbHost='localhost';
    
    public $encAlm='sha1';
    public $salt='';
    public $dbName='';
    public $dns="mysql:host=127.0.0.1;dbname=";
    /**
     * Get the value of dbUser
     */ 
    public function getDbUser()
    {
        return $this->dbUser;
    }

    /**
     * Get the value of dbPassword
     */ 
    public function getDbPassword()
    {
        return $this->dbPassword;
    }

    /**
     * Get the value of dbHost
     */ 
    public function getDbHost()
    {
        return $this->dbHost;
    }

    /**
     * Get the value of encAlm
     */ 
    public function getEncAlm()
    {
        return $this->encAlm;
    }

    /**
     * Get the value of salt
     */ 
    public function getSalt()
    {
        return $this->salt;
    }

    /**
     * Get the value of dbName
     */ 
    public function getDbName()
    {
        return $this->dbName;
    }

    public function __tostring(){
        return "Incorrect type of call :)";
    }

    /**
     * Get the value of dns
     */ 
    public function getDns()
    {
        return $this->dns;
    }
}