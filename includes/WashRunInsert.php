<?php
require_once('psl-configPDO.php');

if(!empty($_POST)){
  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$dbusern,$dbpassw);
  $sql = "INSERT INTO WashRuns (DateTimeCode,  BatchNum,  WashName,  SourceAmount,  SourceContainer,  AlcByVol,  GallonsDistilled,  GallonsRemaining,  StartColl,  StopColl,  WGCollected,  ProofCollected,  PGCollected,  PGEfficiency,  Temp_C,  Distilled_pH,  StartProof,  StopProof,  DestinationProduct,  DestinationContainer,  WG_existing,  WG_resulting,  PG_existing,  PG_resulting,  Notes,  Initials) 
                       VALUES (:DateTimeCode, :BatchNum, :WashName, :SourceAmount, :SourceContainer, :AlcByVol, :GallonsDistilled, :GallonsRemaining, :StartColl, :StopColl, :WGCollected, :ProofCollected, :PGCollected, :PGEfficiency, :Temp_C, :Distilled_pH, :StartProof, :StopProof, :DestinationProduct, :DestinationContainer, :WG_existing, :WG_resulting, :PG_existing, :PG_resulting, :Notes, :Initials)";
  if($insertWashRun = $pdo->prepare($sql)){

      $DateTimeCode = $_POST[ 'DateTimeCode' ];
      $BatchNum= $_POST[ 'BatchNum' ];
      $WashName= $_POST[ 'WashName' ];
      $SourceAmount= $_POST[ 'SourceAmount' ];
      $SourceContainer= $_POST[ 'SourceContainer' ];
      $AlcByVol= $_POST[ 'AlcByVol' ];                 
      $GallonsDistilled= $_POST[ 'GallonsDistilled' ];                 
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
      $WG_existing= $_POST[ 'WG_existing' ];                 
      $WG_resulting= $_POST[ 'WG_resulting' ];                 
      $PG_existing= $_POST[ 'PG_existing' ];                 
      $PG_resulting= $_POST[ 'PG_resulting' ];                 
      $Notes= $_POST[ 'Notes' ];                 
      $Initials= $_POST[ 'Initials' ];                 

      $result = $insertWashRun->execute(array(':DateTimeCode'=>$DateTimeCode, ':BatchNum'=>$BatchNum, ':WashName'=>$WashName, ':SourceAmount'=>$SourceAmount, ':SourceContainer'=>$SourceContainer, ':AlcByVol'=>$AlcByVol, ':GallonsDistilled'=>$GallonsDistilled, ':GallonsRemaining'=>$GallonsRemaining, ':StartColl'=>$StartColl, ':StopColl'=>$StopColl, ':WGCollected'=>$WGCollected, ':ProofCollected'=>$ProofCollected, ':PGCollected'=>$PGCollected, ':PGEfficiency'=>$PGEfficiency, ':Temp_C'=>$Temp_C, ':Distilled_pH'=>$Distilled_pH, ':StartProof'=>$StartProof, ':StopProof'=>$StopProof, ':DestinationProduct'=>$DestinationProduct, ':DestinationContainer'=>$DestinationContainer, ':WG_existing'=>$WG_existing, ':WG_resulting'=>$WG_resulting, ':PG_existing'=>$PG_existing, ':PG_resulting'=>$PG_resulting, ':Notes'=>$Notes, ':Initials'=>$Initials));

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
