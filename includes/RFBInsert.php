<?php
require_once('psl-configPDO.php');
if(!empty($_POST)){
  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
  $sql = "INSERT INTO RemovedFromBond (DateTimeCode, BatchNum, BottlesRemoved, BottlesRemaining, CaseNumbers, Destination, InvoiceNumber) 
                          VALUES (:DateTimeCode, :BatchNum, :BottlesRemoved, :BottlesRemaining, :CaseNumbers, :Destination, :InvoiceNumber)";
  if($insertWashRun = $pdo->prepare($sql)){
  
      $DateTimeCode = $_POST[ 'DateTimeCode' ];                    
      $BatchNum= $_POST[ 'BatchNum' ];                   
      $BottlesRemoved= $_POST[ 'BottlesRemoved' ];                 
      $BottlesRemaining= $_POST[ 'BottlesRemaining' ];                 
      $CaseNumbers= $_POST[ 'CaseNumbers' ];                 
      $Destination= $_POST[ 'Destination' ];                 
      $InvoiceNumber= $_POST[ 'InvoiceNumber' ];                 
  
      $result = $insertWashRun->execute(array(':DateTimeCode'=>$DateTimeCode, ':BatchNum'=>$BatchNum, ':BottlesRemoved'=>$BottlesRemoved, ':BottlesRemaining'=>$BottlesRemaining, ':CaseNumbers'=>$CaseNumbers, ':Destination'=>$Destination, ':InvoiceNumber'=>$InvoiceNumber));
          
    header('Location: ../CDC_RemoveFromBond.php');
      } 
  else{
      echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
      }
exit;
} 
echo "$_POST Empty";
?>

