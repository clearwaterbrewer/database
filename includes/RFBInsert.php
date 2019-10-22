<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
$sql = "INSERT INTO RemovedFromBond (BatchNum, BottlesRemoved, BottlesRemaining, CaseNumbers, Destination, InvoiceNumber) 
        VALUES (?, ?, ?, ?, ?, ?)";
if($stmt = $mysqli->prepare($sql)){
    $stmt->bind_param("ssss", $BatchNum, $BottlesRemoved, $BottlesRemaining, $CaseNumbers, $Destination, $InvoiceNumber);
    $BatchNum = $_POST['BatchNum'];
    $BottlesRemoved = $_POST['BottlesRemoved'];
    $BottlesRemaining = $_POST['BottlesRemaining'];
    $CaseNumbers = $_POST['CaseNumbers'];
    $Destination = $_POST['Destination'];
    $InvoiceNumber = $_POST['InvoiceNumber'];
    $stmt->execute();
        
    header('Location: ../CDC_RemoveFromBond.php');
    } 
else{
    echo "ERROR: Could not prepare query: $sql. " . $mysqli->error;
    }
 
?>
