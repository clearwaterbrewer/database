<?php
//This is how I connect to my database, 
include_once 'includes/db_connect_PDO.php';
?>

<!DOCTYPE html>
<html>
 <body>

<?php
$db = new Database;

$db->prepare('SELECT BatchNum, BatchName, SourceProduct, SourceIngredient FROM Batches WHERE BatchNum = ?');
$db->execute($_POST['batchNum']);

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

 </body>
</html>

