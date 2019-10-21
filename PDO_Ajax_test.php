<?php
require_once('includes/psl-configPDO.php');
$db = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
$BatchNum = 4;
$sth = $dbh->prepare('SELECT BatchName
    FROM Batches
    WHERE Batchnum = :BatchNum');
$sth->bindParam(':BatchNum', $BatchNum, PDO::PARAM_INT);
$sth->execute();
?>
