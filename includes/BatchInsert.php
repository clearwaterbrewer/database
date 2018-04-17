<?php
include_once 'db_connect.php';
include_once 'psl-config.php';


$sql = "INSERT INTO Batches (BatchName, ClassType, SourceProduct, SourceIngredient) VALUES (?, ?, ?, ?)";
if($stmt = $mysqli->prepare($sql)){
    $stmt->bind_param("ssss", $BatchName, $ClassType, $SourceProduct, $SourceIngredient);
    $BatchName = $_POST['BatchName'];
    $ClassType = $_POST['ClassType'];
    $SourceProduct = $_POST['SourceProduct'];
    $SourceIngredient = $_POST['SourceIngredient'];
    $stmt->execute();
        
    header('Location: ../CDC_Batches.php');
    } 
else{
    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
    }
 
?>
