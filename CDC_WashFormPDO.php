<?php
require_once('includes/psl-configPDO.php');
$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password);
$db = $pdo->prepare("SELECT BatchNum, BatchName FROM Batches");
$db->execute();
?>

<!DOCTYPE HTML>
<html class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Wash Run Entry" >
<meta property="og:description" content="Please click submit to complete this form.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<link type="text/css" rel="stylesheet" href="styles/main.css" />
<head>
 <title>CDC Wash Run Entry</title>
 <script src = includes/jquery.min.js></script>
</head>
<body>
<form class="jotform-form" accept-charset="utf-8" id="WashForm" name="washform" method="POST">
<div class="form-all">
  <ul class="form-section page-section">
    <li id="cid_1" class="form-input-wide" data-type="control_head">
      <div class="form-header-group ">
        <div class="header-text httal htvam">
          <h1>CDC Wash Run Entry</h2>
          <label class="form-label form-label-top form-label-auto">Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
        </div>
      </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" for="DateTimeCode">DateTimeCode</label>
        <div class="form-input-wide">
          <input type="text" class="form-control" size="20" name="DateTimeCode" value="<?php echo date('Y-m-d H:i:s'); ?>" required>
        </div>
    </li>
    <li class="form-line" data-type="control_dropdown">
        <label class="form-label form-label-top form-label-auto" for="choose-batch">Choose a Batch</label>
        <div class="form-input-wide">



		<select class='form-dropdown' id='choose-batch'>
          <?php while($row = $db->fetchObject()): ?>
// show both name and number in drop-down
		<option value="<?= $row->BatchNum ?>" ><?= $row->BatchNum." - ".$row->BatchName ?></option>
          <?php endwhile; ?>
          </select>
  
  
 
       </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" for="BatchName">Batch Name</label>
        <div class="form-input-wide">
          
          <input type='text' class='form-control' size='20' id='choose-batch' name='BatchName' value="<?php echo $row['BatchName'];?>" />
      
      </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" for="SourceProduct">Source Product</label>
        <div class="form-input-wide">
          <input type="text" class="form-control" size="20" id='choose-batch' name="SourceProduct" value="" required>
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" for="SourceIngredient">Source Ingredient</label>
        <div class="form-input-wide">
          <input type="text" class="form-control" size="20" id='choose-batch' name="SourceIngredient" value="" required>
        </div>
    </li>
  </ul>
    <ul class="form-section page-section" >
    <li class="form-line" data-type="control_text" >
      <div class="buttonrow">
        <div class="col-1 form-buttons-wrapper">
            <button type="submit" class="form-submit-button" id="submit_form" name="submit" value="Submit">Submit</button>
        </div>
      <div class="col-1 form-buttons-wrapper">
         <a href="CDChome.php" >
           <button type="button" class="form-submit-button" >
             Home
           </button>
         </a>
       </div>
       <div class="col-1 form-buttons-wrapper">
          <a href="includes/logout.php">
            <button type="button" class="form-submit-button" >
              Logout
            </button>
          </a>
        </div>
      </div>
    </li>
  </ul>
</div>
</form>        

  <script>

    // monitor for changes in drop-down
    $(document).ready(function() {  // technically not necessary if script is at the bottom, but I do it out of habit

      $('#choose-batch').on('change', function() {
        retrieveItem( $(this).val() );
      })
    });

    // send batchNum via ajax
    function retrieveItem(BatchNumber) {

      $.post(
        "CDC_Ajax_PDO.php",               // where to send data
        {BatchNum: BatchNumber},  // parameters to send {varname: value}
        function(result) {        // what to do with results
          if(result.message=='success') {
            populateForm(result.data);
          } else {
            alert ('oops, failed');
          }
        }
      );
    }

    // put results into page
    function populateForm(data) {
      $('#BatchName').val(data.BatchName);
      $('#SourceProduct').val(data.SourceProduct);
      $('#SourceIngredient').val(data.SourceIngredient);
    }
  </script>



</body>
</html>
