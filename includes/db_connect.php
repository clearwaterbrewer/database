<?php
require_once('psl-config.php');
$mysqli = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD);
try{
    $mysqli = new PDO('mysql:host='.HOST.';dbname='.DATABASE,USER,PASSWORD);
                    $mysqli->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    die();
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 
                          'message' => 'Unable to connect to '.HOST.':'.DATABASE.' with '.USER)));
}
?>
