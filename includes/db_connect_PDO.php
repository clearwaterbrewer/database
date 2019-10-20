<?php
require_once('includes/psl-configPDO.php');

try{
    $dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password,
                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 'message' => 'Unable to connect')));
}
$conn = null;
?>







