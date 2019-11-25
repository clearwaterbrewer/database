<?php
require_once('psl-configPDO.php');
if(!empty($_POST)){
  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$dbusern,$dbpassw);
  $sql = "INSERT INTO RemovedFromBond ( DateTimeCode,  BatchNum,  BottlesRemoved,  BottlesRemaining,  CaseNumbers,  Destination,  InvoiceNumber,  Initials) 
                               VALUES (:DateTimeCode, :BatchNum, :BottlesRemoved, :BottlesRemaining, :CaseNumbers, :Destination, :InvoiceNumber, :Initials)";
  if($insertRFB = $pdo->prepare($sql)){
      $DateTimeCode = $_POST[ 'DateTimeCode' ];                    
      $BatchNum = $_POST[ 'BatchNum' ];                   
      $BottlesRemoved = $_POST[ 'BottlesRemoved' ];                 
      $BottlesRemaining = $_POST[ 'BottlesRemaining' ];                 
      $CaseNumbers = $_POST[ 'CaseNumbers' ];                 
      $Destination = $_POST[ 'Destination' ];                 
      $InvoiceNumber = $_POST[ 'InvoiceNumber' ];                 
      $Initials = $_POST['Initials' ];                 
  
      $result = $insertRFB->execute(array(':DateTimeCode'=>$DateTimeCode, ':BatchNum'=>$BatchNum, ':BottlesRemoved'=>$BottlesRemoved, ':BottlesRemaining'=>$BottlesRemaining, ':CaseNumbers'=>$CaseNumbers, ':Destination'=>$Destination, ':InvoiceNumber'=>$InvoiceNumber, ':Initials'=>$Initials));

      header('Location: ../CDC_RemoveFromBond.php');
      $insertRFB = null;
      } 
  else{
      echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
      }
exit;
} 
echo "POST Empty";
?>

