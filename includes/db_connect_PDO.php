<?php
require_once('includes/psl-configPDO.php');

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT BatchNum, BatchName, SourceProduct, SourceIngredient FROM Batches");
    $stmt->execute();
    // set the resulting array to associative
    }
    catch(PDOException $e) {
     echo "Error: " . $e->getMessage();
    }
$conn = null;

?>






