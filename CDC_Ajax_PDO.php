<?php
require_once('includes/psl-configPDO.php');

$db = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
$db->prepare('SELECT BatchName, SourceProduct, SourceIngredient FROM Batches WHERE BatchNum = ?');
$db->execute($_POST['BatchNum']);
$data = new stdClass;
$status = 'failed';
if ($row = $db->fetch_assoc() ) {
    $data = $row;
    $status = 'success';
    }
header('Content-Type: application/json');
echo json_encode([
    'status' => $status,
    'data' => $data
    ]);
?>

