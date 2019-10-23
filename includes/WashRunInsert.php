<?php
require_once('psl-configPDO.php');

if(!empty($_POST)){
  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
  $sql = "INSERT INTO WashRuns (DateTimeCode, BatchNum, WashName, SourceAmount) VALUES (:DateTimeCode, :BatchNum, :WashName, :SourceAmount)";
//  $sql = "INSERT INTO WashRuns ( DateTimeCode,  BatchNum,  WashName,  SourceAmount,  AlcByVol,  GallonsDistilled,  GallonsRemaining,  StartColl,  StopColl,  WGCollected,  ProofCollected,  PGCollected,  PGEfficiency,  Temp_C,  Distilled_pH,  StartProof,  StopProof,  DestinationProduct,  DestinationContainer,  WG_existing,  WG_resulting,  PG_existing,  PG_resulting,  Notes) 
                        VALUES (:DateTimeCode, :BatchNum, :WashName, :SourceAmount, :AlcByVol, :GallonsDistilled, :GallonsRemaining, :StartColl, :StopColl, :WGCollected, :ProofCollected, :PGCollected, :PGEfficiency, :Temp_C, :Distilled_pH, :StartProof, :StopProof, :DestinationProduct, :DestinationContainer, :WG_existing, :WG_resulting, :PG_existing, :PG_resulting, :Notes)";
  if($insertWashRun = $pdo->prepare($sql)){

      $DateTimeCode = $_POST[ 'DateTimeCode' ];
      $BatchNum= $_POST[ 'BatchNum' ];
      $WashName= $_POST[ 'WashName' ];
      $SourceAmount= $_POST[ 'SourceAmount' ];

      $result = $insertWashRun->execute(array(':DateTimeCode'=>$DateTimeCode, ':BatchNum'=>$BatchNum, ':WashName'=>$WashName, ':SourceAmount'=>$SourceAmount));
//      $result = $insertWashRun->execute(array(':DateTimeCode'=>$DateTimeCode, ':BatchNum'=>$BatchNum, ':WashName'=>$WashName, ':SourceAmount'=>$SourceAmount, ':AlcByVol'=>$AlcByVol, ':GallonsDistilled'=>$GallonsDistilled, ':GallonsRemaining'=>$GallonsRemaining, ':StopColl'=>$StopColl, ':WGCollected'=>$WGCollected, ':ProofCollected'=>$ProofCollected, ':PGCollected'=>$PGCollected, ':PGEfficiency'=>$PGEfficiency, ':Temp_C'=>$Temp_C, ':Distilled_pH'=>$Distilled_pH, ':StartProof'=>$StartProof, ':StopProof'=>$StopProof, ':DestinationProduct'=>$DestinationProduct, ':DestinationContainer'=>$DestinationContainer, ':WG_existing'=>$WG_existing, ':WG_resulting'=>$WG_resulting, ':PG_existing'=>$PG_existing, ':PG_resulting'=>$PG_resulting, ':Notes'=>$Notes));

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
