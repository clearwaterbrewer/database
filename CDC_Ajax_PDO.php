<?php
require_once('includes/psl-configPDO.php');

$db = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
$db->prepare('SELECT BatchNum, BatchName, SourceProduct, SourceIngredient FROM Batches WHERE BatchNum = ?');
$db->execute($_POST['BatchNum']);
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
  
 <body>
 </body>
</html>

