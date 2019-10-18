<?php
include_once 'includes/db_connect.php';
?>
<!DOCTYPE HTML>
<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Wash Run Entry" >
<meta property="og:description" content="Please click submit to complete this form.">
<title>CDC Wash Run Entry</title>
<link type="text/css" rel="stylesheet" href="styles/main.css" />
<head>
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
    ?>
<label for="BatchName">Batch Name</label>
       <?php   
          echo "<input name='BatchName' value='" . $row['BatchName'] . "'><br>";
       ?>
<label for="SourceProduct">Source Product</label>
          <input type="text" name="SourceProduct" value="" required><br>

<label for="SourceIngredient">Source Ingredient</label>
          <input type="text" name="SourceIngredient" value="" required><br>

<button type="submit" name="submit" value="Submit" id="submit_form">Submit</button>
<a href="CDChome.php" ><button type="button" >Home</button></a>
<a href="includes/logout.php"><button type="button" >Logout</button></a>



</form>        
</body>
</html>

