<?php include_once 'includes/db_connect.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
<title>CDC Wash Run Entry</title>
  <script>
  function showBatch(str) {
    if (str == "") {
        document.getElementById("txtMessage").innerHTML = "";
        return;
    } 
    else { 
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtMessage").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","CDCAjax3.php?b="+str,true);
        xmlhttp.send();
    }
}
  </script>
</head>
<body>
<form id="WashForm" name="washform" method="POST">
<h1>CDC Wash Run Entry</h2>
<label Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
<label for="DateTimeCode">DateTimeCode</label>
 <input name="DateTimeCode" value="<?php echo date('Y-m-d H:i:s'); ?>" required><br>
<label for="BatchNum">BatchNum</label>
         
	<?php
	$sql = "SELECT BatchNum, BatchName, SourceProduct, SourceIngredient FROM Batches ORDER by BatchNum DESC";
	$result = $mysqli->query($sql);
	echo "<select name='BatchNum' id='BatchNum' onchange='showBatch(this.value)>";
	echo "<option value=''> Select BatchNum        </option>";
	while ($row = $result->fetch_assoc()) {
		echo "<option value='" . $row['BatchNum'] . "'>" . $row['BatchNum'] .' - '. $row['BatchName'] . "</option>";
    }
    echo "</select><br>";
	echo $row['BatchNum'].<br>;
	echo $row['BatchName'].<br>;
	echo $row['SourceProduct'].<br>;
	echo $row['SourceIngredient'].<br>;

	?>
<label for="BatchName">Batch Name</label>
       <?php echo "<input name='BatchName' value='" . $row['BatchName'] . "'><br>"; ?>
<label for="SourceProduct">Source Product</label>
       <?php echo "<input name='BatchName' value='" . $row['SourceProduct'] . "'><br>"; ?>
<label for="SourceIngredient">Source Ingredient</label>
       <?php echo "<input name='BatchName' value='" . $row['SourceIngredient'] . "'><br>"; ?>

</form>        
</body>
</html>
