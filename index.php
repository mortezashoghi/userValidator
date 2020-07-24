<?php

require_once 'application/customers.php';
require_once 'application/db.php';

// Start the session
session_start();
$dba=new db("mysql:host=127.0.0.1;dbname=sunshine","mors","mortex");
var_dump($dba);
var_dump(db::$conn);

// $controller=$_GET["switch"];
// $token=$_GET["token"];
// echo $controller.$token;
// if($controller=="getToken" && $token!=""){
// $getToken=new customers("","",$token);
// $result=$getToken->customerVlidator();
// print_r($result);

//}