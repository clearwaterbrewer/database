<?php
require_once('includes/psl-configPDO.php');
?>
<!DOCTYPE html>
<html>
 <body>
<?php
$db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
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

