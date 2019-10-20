<?php
try{
    $dbh = new PDO( 'mysql:host=127.0.0.1;dbname=CDCtest','DBadmin','qwer1234');
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}
$dbh = null;
?>

