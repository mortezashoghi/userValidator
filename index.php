<?php

require_once 'application/customers.php';
// Start the session
session_start();

//$results = $stm->fetchAll(PDO::FETCH_ASSOC);
//$json = json_encode($results);
$urlPath=parse_url($_SERVER["request_uri"],PHP_URL_PATH);
var_dump(parse_url($_SERVER["request_uri"]));
 /*if($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET["switch"]=="getToken" && $_GET["token"]!=""){

     $getToken=new customers("","",$_GET["token"]);
    $result=$getToken->customerVlidator();
    print_r($result);

    }
 else if($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET["switch"]=="register"){
        $data=array("username"=>$_POST["username"],"password"=>$_POST["password"],
            "name"=>$_POST["name"],
            "family"=>$_POST["family"],
            "upgrade"=>$_POST["upgrade"],
            "access"=>$_POST["access"],
            "mobile"=>$_POST["mobile"],
            "state"=>$_POST["state"],
            "comment"=>$_POST["comment"],);
        $customer=new customers($data["name"],$data["family"],"");
        $result=$customer->registerNew($data);
 }else{
     return false;
 }


*/