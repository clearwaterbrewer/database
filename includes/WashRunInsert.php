<?php
include_once('db_connect.php');
require_once('includes/psl-configPDO.php');

$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
$sql = "INSERT INTO WashRuns (DateTimeCode, BatchNum, WashName, SourceAmount, SourceContainer, AlcByVol, GallonsDistilled, 
GallonsRemaining, StartColl, StopColl, WGCollected, ProofCollected, PGCollected, PGEfficiency, Temp_C, Distilled_pH, 
StartProof, StopProof, DestinationProduct, DestinationContainer, WG_existing, WG_resulting, PG_existing, PG_resulting, Notes)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
if($insertWashRun = $pdo->prepare($sql)){
    $insertWashRun->bind_param($DateTimeCode, $BatchNum, $WashName, $SourceAmount, $SourceContainer, $AlcByVol, $GallonsDistilled, 
$GallonsRemaining, $StartColl, $StopColl, $WGCollected, $ProofCollected, $PGCollected, $PGEfficiency, $Temp_C, $Distilled_pH, 
$StartProof, $StopProof, $DestinationProduct, $DestinationContainer, $WG_existing, $WG_resulting, $PG_existing, $PG_resulting, $Notes);
    $DateTimeCode = $_POST['DateTimeCode'];
    $BatchNum = $_POST['BatchNum'];
    $WashName = $_POST['WashName'];
    $SourceAmount = $_POST['SourceAmount'];
    $SourceContainer = $_POST['SourceContainer'];
    $AlcByVol = $_POST['AlcByVol'];
    $GallonsDistilled = $_POST['GallonsDistilled'];
    $GallonsRemaining = $_POST['GallonsRemaining'];
    $StartColl = $_POST['StartColl'];
    $StopColl = $_POST['StopColl'];
    $WGCollected = $_POST['WGCollected'];
    $ProofCollected = $_POST['ProofCollected'];
    $PGCollected = $_POST['PGCollected'];
    $PGEfficiency = $_POST['PGEfficiency'];
    $Temp_C = $_POST['Temp_C'];
    $Distilled_pH = $_POST['Distilled_pH'];
    $StartProof = $_POST['StartProof'];
    $StopProof = $_POST['StopProof'];
    $DestinationProduct = $_POST['DestinationProduct'];
    $DestinationContainer = $_POST['DestinationContainer'];
    $WG_existing = $_POST['WG_existing'];
    $WG_resulting = $_POST['WG_resulting'];
    $PG_existing = $_POST['PG_existing'];
    $PG_resulting = $_POST['PG_resulting'];
    $Notes = $_POST['Notes'];
    $insertWashRun->execute();

        
    header('Location: ../CDC_WashRuns.php');
    } 
else{
    echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
    }
 
?>
