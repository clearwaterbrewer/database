<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
if (isset($_POST['submit'])) {
        
        
  $insert_stmt = $mysqli->prepare("INSERT INTO Batches (BatchName, ClassType, SourceProduct, SourceIngredient) VALUES (?, ?, ?, ?)");
  $insert_stmt->bind_param('ssss', $BatchName, $ClassType, $SourceProduct, $SourceIngredient);
  $insert_stmt->execute());
}
?>
