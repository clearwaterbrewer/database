<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
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

<?php if (login_check($mysqli) == true) : ?>


<?php
$b = intval($_GET['b']);
 
$sql="SELECT * FROM Batches WHERE ID = '".$b."'";
$result = $mysqli->query($sql);

while ($row = mysqli_fetch_array($result)) {

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

  

<?php else : ?>
<form class="jotform-form" accept-charset="utf-8">
  <div class="form-all">
    <ul class="form-section page-section">        
      <li id="cid_1" class="form-input-wide" data-type="control_head">
        <div class="form-header-group ">
          <div class="header-text httal htvam">
            <h2 id="header_1" class="form-header" data-component="header">
              NOT AUTHORIZED
             </h2>
              <label class="form-label form-label-top form-label-auto">You must be an authorized user. </label>
          </div>
        </div>
      </li
    </ul>
    <ul class="form-section page-section">        
      <li class="form-line" data-type="control_text">
        <div class="form-input-wide">
          <div class="form-buttons-wrapper">
           <a href="index.php">
              <button type="button" class="form-submit-button" >
                Login
              </button>
            </a>
          </div>
        </div>
      </li>
    </ul>
  </div>
 </form>        
<?php endif; ?>
 </body>
</html>
