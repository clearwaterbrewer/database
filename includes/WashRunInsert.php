<?php
include_once('db_connect.php');
require_once('includes/psl-configPDO.php');

if(!empty($_POST)){
  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
  $sql = "INSERT INTO WashRuns (DateTimeCode, BatchNum, WashName, SourceAmount) VALUES (:DateTimeCode, :BatchNum, :WashName, :SourceAmount)";
  if($insertWashRun = $pdo->prepare($sql)){
  
      $DateTimeCode = $_POST[ 'DateTimeCode' ];                    
      $BatchNum= $_POST[ 'BatchNum' ];                   
      $WashName= $_POST[ 'WashName' ];                 
      $SourceAmount= $_POST[ 'SourceAmount' ];                 
  
      $result = $insertWashRun->execute(array(':DateTimeCode'=>$DateTimeCode, ':BatchNum'=>$BatchNum, ':WashName'=>$WashName, ':SourceAmount'=>$SourceAmount));
          
      header('Location: ../CDC_WashRuns.php');
      } 
  else{
      echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
      }
exit;
} 
?>
