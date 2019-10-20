<?php
include_once 'includes/db_connect.php';
?>
<!DOCTYPE html>
<html>
 <head>
  <style>
  table {
    width: 100%;
    border-collapse: collapse;
  }
  table, td, th {
    border: 1px solid black;
    padding: 5px;
  }
  th {text-align: left;}
  </style>
 </head>
 <body>

<?php
$b = intval($_GET['b']);
$sql="SELECT * FROM Batches WHERE BatchNum = '".$b."'";
$result = $mysqli->query($sql);
echo "<table>
<tr>
<th>BatchNum</th>
<th>BatchName</th>
<th>SourceProduct</th>
<th>SourceIngredient</th>
</tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['BatchNum'] . "</td>";
    echo "<td>" . $row['BatchName'] . "</td>";
    echo "<td>" . $row['SourceProduct'] . "</td>";
    echo "<td>" . $row['SourceIngredient'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
  
  
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

