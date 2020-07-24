<?php

require_once $_SERVER['DOCUMENT_ROOT'].'/sunshine/config.php';
require_once 'db.php';
class customers{

private $customerName;
private $customerFamily;
private $dateModified;
private $token;
private $upgrade;
private $state;
private $comment;
private $access;
//public $dbconn;
private  $dns;
private  $dbuser;
private  $password;

public function __construct($name="",$family="",$token="")
{
    $this->setCustomerName($name);
    $this->setCustomerFamily($family);
    $this->setToken($token);
    $config=new config();
    echo $config->getDns();
    $this->setDns($config->getDns());
    $this->setDbuser($config->getDbUser());
    $this->setPassword($config->getDbPassword());

}

// getter and setter

/**
 * Get the value of customerName
 */ 
public function getCustomerName()
{
return $this->customerName;
}

/**
 * Set the value of customerName
 *
 * @return  self
 */ 
public function setCustomerName($customerName)
{
$this->customerName = $customerName;

return $this;
}

/**
 * Get the value of customerFamily
 */ 
public function getCustomerFamily()
{
return $this->customerFamily;
}

/**
 * Set the value of customerFamily
 *
 * @return  self
 */ 
public function setCustomerFamily($customerFamily)
{
$this->customerFamily = $customerFamily;

return $this;
}

/**
 * Get the value of dateModified
 */ 
public function getDateModified()
{
return $this->dateModified;
}

/**
 * Set the value of dateModified
 *
 * @return  self
 */ 
public function setDateModified($dateModified)
{
$this->dateModified = $dateModified;

return $this;
}

/**
 * Get the value of token
 */ 
public function getToken()
{
return $this->token;
}

/**
 * Set the value of token
 *
 * @return  self
 */ 
public function setToken($token)
{
$this->token = $token;

return $this;
}

/**
 * Get the value of upgrade
 */ 
public function getUpgrade()
{
return $this->upgrade;
}

/**
 * Set the value of upgrade
 *
 * @return  self
 */ 
public function setUpgrade($upgrade="no")
{
$this->upgrade = $upgrade;

return $this;
}

/**
 * Get the value of state
 */ 
public function getState()
{
return $this->state;
}

/**
 * Set the value of state
 *
 * @return  self
 */ 
public function setState($state="ok")
{
$this->state = $state;

return $this;
}


/**
 * Get the value of comment
 */ 
public function getComment()
{
return $this->comment;
}

/**
 * Set the value of comment
 *
 * @return  self
 */ 
public function setComment($comment=null)
{
$this->comment = $comment;

return $this;
}

/**
 * Get the value of access
 */ 
public function getAccess()
{
return $this->access;
}

/**
 * Set the value of access
 *
 * @return  self
 */ 
public function setAccess($access=1)
{
$this->access = $access;

return $this;
}


//end of getter and setter

public function registerNew()
{
    $stm="insert into customers(name,family,c_date,upgrade,access,token,state,comment) values (:name,:family,:c_date,:upgrade,:access,:token,:state,:comment)";
    if($this->getCustomerName()=="" || $this->getCustomerFamily()=="" || $this->getToken()==""){
        return false;

    }else{
        $this->createToken();
        $stm=$this->$dbconn->prepare($stm);
        $stm->bindParam(':name',$this->getCustomerName());
        $stm->bindParam(':family',$this->getCustomerFamily());
        $stm->bindParam(':c_date',date("Y/m/d"));
        $stm->bindParam(':upgrade',$this->getUpgrade());
        $stm->bindParam(':access',$this->getAccess());
        $stm->bindParam(':token',$this->getToken());
        $stm->bindParam(':state',$this->getState());
        $stm->bindParam(':comment',$this->getComment());
        $stm->execute();
}
}

public function editCustomer()
{
    $stm="update customers set name=:name,family=:family,c_date=:c_date,upgrade=:upgrade,access=:access,token=:token,state=:state,comment=:comment)";
    if($this->getCustomerName()=="" || $this->getCustomerFamily()=="" || $this->getToken()==""){
        return false;

    }else
    {
        $stm=$this->$dbconn->prepare($stm);
        $stm->bindParam(':name',$this->getCustomerName());
        $stm->bindParam(':family',$this->getCustomerFamily());
        $stm->bindParam(':c_date',date("Y/m/d"));
        $stm->bindParam(':upgrade',$this->getUpgrade());
        $stm->bindParam(':access',$this->getAccess());
        $stm->bindParam(':token',$this->getToken());
        $stm->bindParam(':state',$this->getState());
        $stm->bindParam(':comment',$this->getComment());
        $stm->execute();
    }
}
public function deleteCustomer()
{
    # code...
}
public function renewToken()
{
    # code...
}
public function getAll()
{
    # code...
}
public function deleteAll()
{
    # code...
}
public function customerVlidator()
{
    $stm="select * from customers where token=:token";
    
    if ($this->getToken()!="") {
        $dbconn=new db($this->getDns(),$this->getDbuser(),$this->getPassword());
        $stm=$dbconn->prepare($stm);
        $stm->bindParam(':token',$this->getToken());
        $stm->execute();
        if ($stm->rowCount() > 0) {
            return true;
          } else {
            return false;
          }
        
     }else{
        return "Incorrect token";
    }
}
public function createToken()
{
    $cnf=new config();
    $salt=$cnf->getSalt();
    $username=$this->getCustomerName();
    $userfamily=$this->getCustomerFamily();
    $this->setToken(sha1($username.$userfamily.$salt));
}
public function  __toString (){
return "I apologize :)";


}


/**
 * Set the value of dns
 *
 * @return  self
 */ 
public function setDns($dns)
{
$this->dns = $dns;

return $this;
}

/**
 * Set the value of dbuser
 *
 * @return  self
 */ 
public function setDbuser($dbuser)
{
$this->dbuser = $dbuser;

return $this;
}

/**
 * Set the value of password
 *
 * @return  self
 */ 
public function setPassword($password)
{
$this->password = $password;

return $this;
}

/**
 * Get the value of dns
 */ 
public function getDns()
{
return $this->dns;
}

/**
 * Get the value of dbuser
 */ 
public function getDbuser()
{
return $this->dbuser;
}

/**
 * Get the value of password
 */ 
public function getPassword()
{
return $this->password;
}
}


