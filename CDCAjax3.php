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

  
<?php
$r = intval($_GET['r']);
$a[] = "C1";
$a[] = "C2";
$a[] = "C3";
$a[] = "C4";
$a[] = "C5";
$a[] = "C6";
$a[] = "C7";
$a[] = "C8";
$a[] = "C9";
$a[] = "C10";
$a[] = "C11";
$a[] = "C12";
$a[] = "C13";
$a[] = "C14";
$a[] = "C15";
$a[] = "C16";
$a[] = "C17";
$a[] = "C18";
$a[] = "C19";
// get the r parameter from URL
$r = $_REQUEST["r"];
$hint = "";
// lookup all hints from array if $q is different from "" 
if ($r !== "") {
    $r = strtolower($r);
    $len=strlen($r);
    foreach($a as $name) {
        if (stristr($r, substr($name, 0, $len))) {
            if ($hint === "") {
                $hint = $name;
            } else {
                $hint .= ", $name";
            }
        }
    }
}
// Output "no suggestion" if no hint was found or output correct values 
//echo $hint === "" ? "no suggestion" : $hint;
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
