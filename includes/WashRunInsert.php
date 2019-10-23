<?php
require_once('psl-configPDO.php');

if(!empty($_POST)){
  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
  $sql = "INSERT INTO WashRuns (DateTimeCode, BatchNum, WashName, SourceAmount, AlcByVol) VALUES (:DateTimeCode, :BatchNum, :WashName, :SourceAmount, :AlcByVol)";
  if($insertWashRun = $pdo->prepare($sql)){

      $DateTimeCode = $_POST[ 'DateTimeCode' ];
      $BatchNum= $_POST[ 'BatchNum' ];
      $WashName= $_POST[ 'WashName' ];
      $SourceAmount= $_POST[ 'SourceAmount' ];
      $AlcByVol= $_POST[ 'AlcByVol' ];                 

      $result = $insertWashRun->execute(array(':DateTimeCode'=>$DateTimeCode, ':BatchNum'=>$BatchNum, ':WashName'=>$WashName, ':SourceAmount'=>$SourceAmount, ':AlcByVol'=>$AlcByVol));

      header('Location: ../CDC_WashRuns.php');
      $insertWashRun = null;
      }
  else{
      echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
      }
exit;
}
echo "_POST Empty";
?>
