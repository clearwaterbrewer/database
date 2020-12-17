<?php
require_once('psl-configPDO.php');
if(!empty($_POST)){
  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$dbusern,$dbpassw);
  $sql = "INSERT INTO DrawerCounts (DateTimeCode, Initials, CountOpen, bill_100, bill_50, bill_20, bill_10, bill_5, bill_1, coin_100, coin_25, coin_10, coin_5, coin_1, CountClose, CountDelta, POS_Amount, POS_Tip, POS_Due)";
  if($insertDrawerCount = $pdo->prepare($sql)){
      $DateTimeCode = $_POST[ 'DateTimeCode' ];                    
      $Initials = $_POST['Initials' ];                 
      $CountOpen = $_POST[ 'CountOpen' ];                   
      $bill_100 = $_POST[ 'bill_100' ];                 
      $bill_50 = $_POST[ 'bill_50' ];                 
      $bill_20 = $_POST[ 'bill_20' ];                 
      $bill_10 = $_POST[ 'bill_10' ];                 
      $bill_5 = $_POST[ 'bill_5' ];                 
      $bill_1 = $_POST[ 'bill_1' ];                 
      $coin_100 = $_POST[ 'coin_100' ];                 
      $coin_25 = $_POST[ 'coin_25' ];                 
      $coin_10 = $_POST[ 'coin_10' ];                 
      $coin_5 = $_POST[ 'coin_5' ];                 
      $coin_1 = $_POST[ 'coin_1' ];                 
      $CountClose = $_POST[ 'CountClose' ];                 
      $CountDelta = $_POST[ 'CountDelta' ];                 
      $POS_Amount = $_POST[ 'POS_Amount' ];                 
      $POS_Tip = $_POST[ 'POS_Tip' ];                 
      $POS_Due = $_POST[ 'POS_Due' ];                 
  
      $result = $DrawerCount->execute(array(':DateTimeCode'=>$DateTimeCode, ':Initials'=>$Initials, ':CountOpen'=>$CountOpen, ':bill_100'=>$bill_100, ':bill_50'=>$bill_50, ':bill_20'=>$bill_20, ':bill_10'=>$bill_10, ':bill_5'=>$bill_5, ':bill_1'=>$bill_1, ':coin_100'=>$coin_100, ':coin_25'=>$coin_25, ':coin_10'=>$coin_10, ':coin_5'=>$coin_5, ':coin_1'=>$coin_1, ':CountClose'=>$CountClose, ':CountDelta'=>$CountDelta, ':POS_Amount'=>$POS_Amount, ':POS_Tip'=>$POS_Tip, ':POS_Due'=>$POS_Due ));

      header('Location: ../CDC_CashDrawerCountForm.php');
      $insertDrawerCount = null;
//      echo "It seemed to work.";
      } 
  else{
      echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
      }
exit;
} 
echo "POST Empty";
?>


