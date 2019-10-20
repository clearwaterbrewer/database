<?php
$strServername = "localhost";
$strDbname = "CDCtest";
$strUsername = "DBadmin";
$strPassword = "qwer1234"; 
try{
    $dbh = new PDO('mysql:host='.$strServername.';dbname='.$strDbname.'",'.$strUsername.','.$strPassword);
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 
                          'message' => 'Unable to connect to '.$strServername.':'.$strDbname.' with '.$strUsername.':'.$strPassword)));
}
$dbh = null;
?>
