<?php
$servername = "localhost";
$dbusern = "distiller";
$dbpassw = "qwer1234"; 
$dbname = "CDCtest";
$CAN_REGISTER = "any";
$DEFAULT_ROLE = "member";
$SECURE = FALSE;    // For development purposes only!!!!

$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $dbusern, $dbpassw);

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $dbusern, $dbpassw);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>

