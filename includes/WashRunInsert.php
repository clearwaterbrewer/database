<?php
require_once('psl-configPDO.php');

if(!empty($_POST)){
  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
  $sql = "INSERT INTO WashRuns ( DateTimeCode,  BatchNum,  WashName,  SourceAmount,  AlcByVol,  GallonsDistilled,  GallonsRemaining,  StartColl,  StopColl,  WGCollected,  ProofCollected,  PGCollected,  PGEfficiency,  Temp_C,  Distilled_pH,  StartProof,  StopProof,  DestinationProduct,  DestinationContainer,  WG_existing,  WG_resulting,  PG_existing,  PG_resulting,  Notes) 
                        VALUES (:DateTimeCode, :BatchNum, :WashName, :SourceAmount, :AlcByVol, :GallonsDistilled, :GallonsRemaining, :StartColl, :StopColl, :WGCollected, :ProofCollected, :PGCollected, :PGEfficiency, :Temp_C, :Distilled_pH, :StartProof, :StopProof, :DestinationProduct, :DestinationContainer, :WG_existing, :WG_resulting, :PG_existing, :PG_resulting, :Notes)";
  if($insertWashRun = $pdo->prepare($sql)){
  
      $DateTimeCode = $_POST[ 'DateTimeCode' ];                    
      $BatchNum= $_POST[ 'BatchNum' ];                   
      $WashName= $_POST[ 'WashName' ];                 
      $= $_POST[ 'SourceAmount' ];                 
      $= $_POST[ 'GallonsDistilled' ];                 
      $= $_POST[ 'GallonsRemaining' ];                 
      $= $_POST[ 'StartColl' ];                 
      $= $_POST[ 'StopColl' ];                 
      $= $_POST[ 'WGCollected' ];                 
      $= $_POST[ 'ProofCollected' ];                 
      $= $_POST[ 'PGCollected' ];                 
      $= $_POST[ 'PGEfficiency' ];                 
      $= $_POST[ 'Temp_C' ];                 
      $= $_POST[ 'Distilled_pH' ];                 
      $= $_POST[ 'StartProof' ];                 
      $= $_POST[ 'StopProof' ];                 
      $= $_POST[ 'DestinationProduct' ];                 
      $= $_POST[ 'DestinationContainer' ];                 
      $= $_POST[ 'WG_existing' ];                 
      $= $_POST[ 'WG_resulting' ];                 
      $= $_POST[ 'PG_existing' ];                 
      $= $_POST[ 'PG_resulting' ];                 
      $= $_POST[ 'Notes' ];                 
  
      $result = $insertWashRun->execute(array(':DateTimeCode'=>$DateTimeCode, ':BatchNum'=>$BatchNum, ':WashName'=>$WashName, ':SourceAmount'=>$SourceAmount, ':AlcByVol'=>$AlcByVol, ':GallonsDistilled'=>$GallonsDistilled, ':GallonsRemaining'=>$GallonsRemaining, ':StopColl'=>$StopColl, ':WGCollected'=>$WGCollected, ':ProofCollected'=>$ProofCollected, ':PGCollected'=>$PGCollected, ':PGEfficiency'=>$PGEfficiency, ':Temp_C'=>$Temp_C, ':Distilled_pH'=>$Distilled_pH, ':StartProof'=>$StartProof, ':StopProof'=>$StopProof, ':DestinationProduct'=>$DestinationProduct, ':DestinationContainer'=>$DestinationContainer, ':WG_existing'=>$WG_existing, ':WG_resulting'=>$WG_resulting, ':PG_existing'=>$PG_existing, ':PG_resulting'=>$PG_resulting, ':Notes'=>$Notes));
          
      header('Location: ../CDC_WashRuns.php');
      } 
  else{
      echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
      }
exit;
} 
echo "$_POST Empty";
?>
