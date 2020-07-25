<?php

require_once 'db.php';

class users{

private $username;
private $password;
private $mobile;
private $fullname;
private $state;
private $dbconnection;
    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * @param mixed $mobile
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    }

    /**
     * @return mixed
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param mixed $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * users constructor.
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
        $this->dbconnection=db::getinstanse();

    }

    public function registerUser()
    {
        //toDo

    }

    public function auth()
    {
        $stm="select * from users where email=:email and password=;password";

        if ($this->getUsername()!="" && $this->getPassword()!="") {
            $stm=$this->connectionpipe->dbh->prepare($stm);
            $this->convertTosha1();
            $hashedPass=$this->getPassword();
            $stm->bindParam(':email',$this->username);
            $stm->bindParam(':password',$hashedPass);
            $stm->execute();
            if ($stm->rowCount() > 0) {
                return true;
            } else {
                return false;
            }

        }else{
            return false;
        }
    }
    public function editState(){


    }

    public function __toString()
    {
     return "You can't access this class";
    }

    private function convertTosha1()
    {
        $hashed=sha1($this->getPassword());
        $this->setPassword($hashed);
    }

}