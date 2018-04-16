<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
if (isset($_POST['submit'])) {
  $BatchName = $_POST['BatchName'];
  $ClassType = $_POST['ClassType'];
  $SourceProduct = $_POST['SourceProduct'];
  $SourceIngredient = $_POST['SourceIngredient'];
        
  $insert_stmt = $mysqli->prepare("INSERT INTO Batches (BatchName, ClassType, SourceProduct, SourceIngredient) VALUES (?, ?, ?, ?)");
  $insert_stmt->bind_param("ssss", $BatchName, $ClassType, $SourceProduct, $SourceIngredient);
  $insert_stmt->execute());
}
?>
