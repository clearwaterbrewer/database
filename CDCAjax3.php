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
$sql="SELECT * FROM Batches WHERE ID = '".$b."'";
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
?>
  
  
<?php
$q = intval($_GET['q']);
 
$sql="SELECT * FROM Containers WHERE ID = '".$q."'";
$result = $mysqli->query($sql);
echo "<table>
<tr>
<th>ID</th>
<th>ContainerName</th>
<th>ContainerVolume</th>
<th>Description</th>
</tr>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['ContainerName'] . "</td>";
    echo "<td>" . $row['ContainerVolume'] . "</td>";
    echo "<td>" . $row['Description'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>

 </body>
</html>
