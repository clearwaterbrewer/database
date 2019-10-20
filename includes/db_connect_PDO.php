<?php
require_once('psl-configPDO.php');

try{
    $dbh = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    die(json_encode(array('outcome' => true)));
}
catch(PDOException $ex){
    die(json_encode(array('outcome' => false, 
                          'message' => 'Unable to connect to '.$servername.':'.$dbname.' with '.$username.':'.$password)));
}
$dbh = null;
?>
