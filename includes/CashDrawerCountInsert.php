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
  
      $result = $insertDrawerCount->execute(array(':DateTimeCode'=>$DateTimeCode, ':Initials'=>$Initials, ':CountOpen'=>$CountOpen, ':bill_100'=>$bill_100, ':bill_50'=>$bill_50, ':bill_20'=>$bill_20, ':bill_10'=>$bill_10, ':bill_5'=>$bill_5, ':bill_1'=>$bill_1, ':coin_100'=>$coin_100, ':coin_25'=>$coin_25, ':coin_10'=>$coin_10, ':coin_5'=>$coin_5, ':coin_1'=>$coin_1, ':CountClose'=>$CountClose, ':CountDelta'=>$CountDelta, ':POS_Amount'=>$POS_Amount, ':POS_Tip'=>$POS_Tip, ':POS_Due'=>$POS_Due ));

//      header('Location: ../CDC_CashDrawerCount.php');
      $insertDrawerCount = null;
		echo $_POST["DateTimeCode"] . PHP_EOL; 
		echo $_POST["Initials"] . PHP_EOL;
		echo $_POST["CountOpen"] . PHP_EOL;
		echo $_POST["bill_100"];
		echo $_POST["bill_50"];
		echo $_POST["bill_20"];
		echo $_POST["bill_10"];
		echo $_POST["bill_5"];
		echo $_POST["bill_1"]; 
		echo $_POST["coin_100"];
		echo $_POST["coin_25"];
		echo $_POST["coin_10"];
		echo $_POST["coin_5"]; 
		echo $_POST["coin_1"];
		echo $_POST["CountClose"];
		echo $_POST["CountDelta"];
		echo $_POST["POS_Amount"];
		echo $_POST["POS_Tip"]; 
		echo $_POST["POS_Due"];
      } 
  else{
      echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
      }
exit;
} 
echo "POST Empty";
?>


