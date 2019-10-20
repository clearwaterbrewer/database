<?php

$servername = "localhost";
$dbname = "CDCtest";
$username = "DBadmin";
$password = "qwer1234"; 

try{
    $dbh = new PDO('mysql:host=$servername;dbname=$dbname",$username,$password');
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}
$dbh = null;
?>
