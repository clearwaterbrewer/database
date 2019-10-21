<?php
require_once('includes/psl-configPDO.php');
$db = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
$db->prepare('SELECT BatchName, SourceProduct, SourceIngredient FROM Batches WHERE BatchNum = ?');

$BatchNum = 4;

$db->bindParam(1, $BatchNum, PDO::PARAM_INT);

$db->execute();

$data = new stdClass;
$status = 'failed';
if ($row = $db->fetchObject() ) {
    $data = $row;
    $status = 'success';
    }
header('Content-Type: application/json');
echo json_encode([
    'status' => $status,
    'data' => $data
    ]);
?>

