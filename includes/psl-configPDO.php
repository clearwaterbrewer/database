<?php
$servername = "localhost";
$username = "DBadmin";
$password = "qwer1234"; 
$dbname = "CDCtest";

$CAN_REGISTER = "any";
$DEFAULT_ROLE = "member";
$SECURE = FALSE;    // For development purposes only!!!!

$dbh = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
