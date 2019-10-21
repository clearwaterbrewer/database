<?php
/* Execute a prepared statement by binding a variable and value */
$BatchNum = 4;
$sth = $dbh->prepare('SELECT BatchName
    FROM Batches
    WHERE Batchnum = :BatchNum');
$sth->bindParam(':BatchNum', $BatchNum, PDO::PARAM_INT);
$sth->execute();
?>
