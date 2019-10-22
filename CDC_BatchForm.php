<?php
require_once('includes/psl-configPDO.php'); //db info
require_once('includes/functions.php'); //security functions
sec_session_start();
?>
<!DOCTYPE HTML>
<html class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Batch Entry" >
<meta property="og:description" content="Please click the link to complete this form.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>CDC Batch Entry</title>
<link type="text/css" rel="stylesheet" href="styles/main.css" />
</head>

<body>
<?php if (login_check($mysqli) == true) : ?>
<form class="jotform-form" accept-charset="utf-8" id="BatchForm" name="batchform" action="includes/BatchInsert.php" method="post">
<div class="form-all">
  <ul class="form-section page-section">
    <li id="cid_1" class="form-input-wide" data-type="control_head">
      <div class="form-header-group ">
        <div class="header-text httal htvam">
          <h1>CDC Batch Entry</h2>
          <label class="form-label form-label-top form-label-auto">Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
        </div>
      </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" for="BatchName">Batch Name</label>
        <div class="form-input-wide">
          <input type="text" class="form-control" size="20" name="BatchName" value="" Placeholder="Rum 13" required>
        </div>
    </li>
    <li class="form-line" data-type="control_dropdown">
        <div class="form-input-wide">
        <label for="ClassType">ClassType</label>
          <?php
            $sql = " SELECT ClassType FROM classtypes ORDER by ClassLetter";
            $result = $mysqli->query($sql);
            echo "<select class='form-dropdown' required name='ClassType' data-component='dropdown'>";
            echo "<option value=''> Select ClassType </option>";
            while ($row = $result->fetch_assoc()) {
              echo "<option value='" . $row['ClassType'] . "'>" . $row['ClassType'] . "</option>";
            }
          echo "</select>";
          ?>
        <label for="SourceProduct">Source Product</label>
          <?php
            $sql = " SELECT ProductName FROM Products ORDER by ProductName";
            $result = $mysqli->query($sql);
            echo "<select class='form-dropdown' required name='SourceProduct' data-component='dropdown'>";
            echo "<option value=''>  </option>";
            while ($row = $result->fetch_assoc()) {
              echo "<option value='" . $row['ProductName'] . "'>" . $row['ProductName'] . "</option>";
            }
           echo "</select>";
          ?>
        <label for="SourceIngredient">Source Ingredient</label>
          <?php
            $sql = " SELECT IngredientName FROM Ingredients ORDER by IngredientName";
            $result = $mysqli->query($sql);
            echo "<select class='form-dropdown' required name='SourceIngredient' data-component='dropdown'>";
            echo "<option value=''>  </option>";
            while ($row = $result->fetch_assoc()) {
              echo "<option value='" . $row['IngredientName'] . "'>" . $row['IngredientName'] . "</option>";
            }
            echo "</select>";
          ?>
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="BottleProof">Proof</label>
          <input type="text" class="form-control" id="BottleProof" name="BottleProof" value="" required >
        <label for="BarrelProof">Barrel Proof</label>
          <input type="text" class="form-control" id="BarrelProof" name="BarrelProof" value="" required >
        <label for="PreviousBatch">Previous Batch</label>
          <input type="text" class="form-control" id="PreviousBatch" name="PreviousBatch" value="" required >
        <label for="UPC">UPC</label>
          <input type="text" class="form-control" id="UPC" name="UPC" value="" required >
        </div>
    </li>
  <ul class="form-section page-section" >
    <li class="form-line" data-type="control_text" >
      <div class="buttonrow">
            <button type="submit" class="form-submit-button" id="submit_form" name="submit" value="Submit">Submit</button>
          <a href="CDC_Batches.php"><button type="button" class="form-submit-button">Back to Batches</button></a>
          <a href="CDChome.php"><button type="button" class="form-submit-button">Home</button></a>
          <a href="includes/logout.php"><button type="button" class="form-submit-button">Logout</button></a>
      </div>
    </li>
  </ul>
</div>
</form>        
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
          <div style="margin-left:40px" class="form-buttons-wrapper">
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
