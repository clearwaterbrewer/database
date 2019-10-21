<?php
include_once('db_connect.php');
require_once('includes/psl-configPDO.php');

$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
$sql = "INSERT INTO WashRuns (DateTimeCode, BatchNum) VALUES (?,?)";
if($insertWashRun = $pdo->prepare($sql)){
    $insertWashRun->bind_param($DateTimeCode, $BatchNum);
    $DateTimeCode = $_POST['DateTimeCode'];
    $BatchNum = $_POST['BatchNum'];
    $insertWashRun->execute();
        
    header('Location: ../CDC_WashRuns.php');
    } 
else{
    echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
    }
 
?>
