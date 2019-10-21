<?php
include_once('db_connect.php');
require_once('includes/psl-configPDO.php');

$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
$sql = "INSERT INTO WashRuns (DateTimeCode, BatchNum, WashName, SourceAmount) VALUES (:DateTimeCode, :BatchNum, :WashName, :SourceAmount)";
if($insertWashRun = $pdo->prepare($sql)){

    $form = $_POST;
    $DateTimeCode = $form[ 'DateTimeCode' ];                    
    $BatchNum= $form[ 'BatchNum' ];                   
    $WashName= $form[ 'WashName' ];                 
    $SourceAmount= $form[ 'SourceAmount' ];                 

    $result = $insertWashRun->execute(array(':DateTimeCode'=>$DateTimeCode, ':BatchNum'=>$BatchNum, ':WashName'=>$WashName, ':SourceAmount'=>$SourceAmount));
        
    header('Location: ../CDC_WashRuns.php');
    } 
else{
    echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
    }
 
?>
