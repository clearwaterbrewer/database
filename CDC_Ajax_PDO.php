<?php
require_once('includes/psl-configPDO.php');
$db = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
$sth = $db->prepare('SELECT BatchName, SourceProduct, SourceIngredient, ClassType, BottleProof, UPC FROM Batches WHERE BatchNum =:BatchNum');

$sth->bindParam(':BatchNum', $_POST['BatchNum'], PDO::PARAM_INT);

$sth->execute();

$data = new stdClass;
$status = 'failed';
if ($row = $sth->fetchObject() ) {
    $data = $row;
    $status = 'success';
    }
header('Content-Type: application/json');
echo json_encode([
    'status' => $status,
    'data' => $data
    ]);
?>

