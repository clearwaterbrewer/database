<?php
include_once 'psl-config.php';   // where DEFINE statements are for constants HOST, USER, PASSWORD, DATABASE

try{
    $dbh = new pdo( 'mysql:host='. HOST .';dbname='. DATABASE .',
                    USER,
                    PASSWORD,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}

?>
