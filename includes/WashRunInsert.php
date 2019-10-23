<?php
require_once('psl-configPDO.php');

if(!empty($_POST)){
  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
  $sql = "INSERT INTO WashRuns (DateTimeCode,  BatchNum,  WashName,  SourceAmount,  AlcByVol,  GallonsDistilled,  GallonsRemaining,  StartColl,  StopColl,  WGCollected,  ProofCollected,  PGCollected,  PGEfficiency,  Temp_C,  Distilled_pH,  StartProof,  StopProof,  DestinationProduct,  DestinationContainer) 
                       VALUES (:DateTimeCode, :BatchNum, :WashName, :SourceAmount, :AlcByVol, :GallonsDistilled, :GallonsRemaining, :StartColl, :StopColl, :WGCollected, :ProofCollected, :PGCollected, :PGEfficiency, :Temp_C, :Distilled_pH, :StartProof, :StopProof, :DestinationProduct, :DestinationContainer)";
  if($insertWashRun = $pdo->prepare($sql)){

      $DateTimeCode = $_POST[ 'DateTimeCode' ];
      $BatchNum= $_POST[ 'BatchNum' ];
      $WashName= $_POST[ 'WashName' ];
      $SourceAmount= $_POST[ 'SourceAmount' ];
      $AlcByVol= $_POST[ 'AlcByVol' ];                 
      $GallonsRemaining= $_POST[ 'GallonsRemaining' ];                 
      $StartColl= $_POST[ 'StartColl' ];                 
      $StopColl= $_POST[ 'StopColl' ];                 
      $WGCollected= $_POST[ 'WGCollected' ];                 
      $ProofCollected= $_POST[ 'ProofCollected' ];                 
      $PGCollected= $_POST[ 'PGCollected' ];                 
      $PGEfficiency= $_POST[ 'PGEfficiency' ];                 
      $Temp_C= $_POST[ 'Temp_C' ];                 
      $Distilled_pH= $_POST[ 'Distilled_pH' ];                 
      $StartProof= $_POST[ 'StartProof' ];                 
      $StopProof= $_POST[ 'StopProof' ];                 
      $DestinationProduct= $_POST[ 'DestinationProduct' ];                 
      $DestinationContainer= $_POST[ 'DestinationContainer' ];                 

      $result = $insertWashRun->execute(array(':DateTimeCode'=>$DateTimeCode, ':BatchNum'=>$BatchNum, ':WashName'=>$WashName, ':SourceAmount'=>$SourceAmount, ':AlcByVol'=>$AlcByVol, ':GallonsDistilled'=>$GallonsDistilled, ':GallonsRemaining'=>$GallonsRemaining, ':StartColl'=>$StartColl, ':StopColl'=>$StopColl, ':WGCollected'=>$WGCollected, ':ProofCollected'=>$ProofCollected, ':PGCollected'=>$PGCollected, ':PGEfficiency'=>$PGEfficiency, ':Temp_C'=>$Temp_C, ':Distilled_pH'=>$Distilled_pH, ':StartProof'=>$StartProof, ':StopProof'=>$StopProof, ':DestinationProduct'=>$DestinationProduct, ':DestinationContainer'=>$DestinationContainer));

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
