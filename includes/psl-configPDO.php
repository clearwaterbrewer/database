<?php
$servername = "localhost";
$username = "distiller";
$password = "qwer1234"; 
$dbname = "CDCtest";

$CAN_REGISTER = "any";
$DEFAULT_ROLE = "member";
$SECURE = FALSE;    // For development purposes only!!!!

// adds delay? $mysqli = new mysqli(HOST, USER, PASSWORD, DATABASE);
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
// does not work with this-> $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$dbh = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>
