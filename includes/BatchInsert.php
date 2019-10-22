<?php
require_once('psl-configPDO.php');
if(!empty($_POST)){
  $pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
  $sql = "INSERT INTO RemovedFromBond ( BatchName,  ClassType,  SourceProduct,  SourceIngredient,  BottleProof,  BarrelProof,  PreviousBatch,  UPC) 
                               VALUES (:BatchName, :ClassType, :SourceProduct, :SourceIngredient, :BottleProof, :BarrelProof, :PreviousBatch, :UPC)";


if($insertBatch = $pdo->prepare($sql)){
    $BatchName = $_POST['BatchName'];
    $ClassType = $_POST['ClassType'];
    $SourceProduct = $_POST['SourceProduct'];
    $SourceIngredient = $_POST['SourceIngredient'];
    $BottleProof = $_POST['BottleProof'];
    $BarrelProof = $_POST['BarrelProof'];
    $PreviousBatch = $_POST['PreviousBatch'];
    $UPC = $_POST['UPC'];
    
    $result = $insertBatch->execute(array(':BatchName'=>BatchName, ':ClassType'=>ClassType, ':SourceProduct'=>SourceProduct, ':SourceIngredient'=>SourceIngredient, ':BottleProof'=>BottleProof, ':BarrelProof'=>BarrelProof, ':PreviousBatch'=>PreviousBatch, ':UPC'=>UPC));
        
    header('Location: ../CDC_Batches.php');
    $insertBatch = null;

    } 
else{
    echo "ERROR: Could not prepare query: $sql. " . $pdo->error;
    }
exit;
} 
echo "$_POST Empty";
 
?>
