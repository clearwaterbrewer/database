<?php
require_once('includes/psl-configPDO.php'); //db info
require_once('includes/functions.php'); //security functions
$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$dbusern,$dbpassw);
sec_session_start();
?>

<!DOCTYPE HTML>
<html class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Bottles in Bond Inventory" >
<meta property="og:description" content="Please click submit to complete this form.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<link type="text/css" rel="stylesheet" href="styles/main.css" />
<head>
 <title>CDC Remove From Bond Entry</title>
 <script src = includes/jquery.min.js></script>
</head>
<body>

<?php if (login_check($mysqli) == true) : ?>

	
<form accept-charset="utf-8" id="RFBForm" name="RFBForm" action="includes/InventoryInsert.php" method="POST">
<div class="form-all">
  <ul class="form-section page-section">
    <li id="cid_1" class="form-input-wide" data-type="control_head">
      <div class="form-header-group ">
        <div class="header-text httal htvam">
          <h1>CDC Bottles in Bond Inventory</h2>
          <label class="form-label form-label-top form-label-auto">Logged in as: 
		  <?php echo htmlentities($_SESSION['username']); ?> </label>
          <label class="form-label form-label-top form-label-auto">DateTimeCode: <?php echo date('Y-m-d H:i:s'); ?> </label>
	</div>
      </div>
    </li>
      <div class="ex3">
	<div class="headrow">
          <div class="column">Batch</div>
	  <div class="column">Name</div>
	  <div class="column">UPC</div>
	  <div class="column">Cases</div>
	  <div class="column">Bottles</div>
	  <div class="column">Counted</div>
	</div>
        <div class=row>
          <?php 

		$sql="SELECT BatchNum, BatchName, UPC FROM Batches WHERE CurrentBatch=1 AND UPC <> '' ORDER by BatchNum DESC";
	      $result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
	  while ($row = $result->fetch_assoc()) {
		  
		echo '<div class=row>';
		echo '<div class=column>'.$row['BatchNum'].'</div>';
		echo '<div class=column>'.$row['BatchName'].'</div>';
		echo '<div class=column>'.$row['UPC'].'</div>';
		echo "</div>";
	    }
	  }
?>	      

      </div>
    </li>
  </ul>
  <ul class="form-section page-section" >
    <li class="form-line" data-type="control_text" >
      <div class="buttonrow">
            <button type="submit" class="form-submit-button" id="submit_form" name="submit" value="Submit">Submit</button>
          <a href="CDC_RemoveFromBond.php"><button type="button" class="form-submit-button">Back to RFB</button></a>
          <a href="CDChome.php"><button type="button" class="form-submit-button">Home</button></a>
          <a href="includes/logout.php"><button type="button" class="form-submit-button">Logout</button></a>
      </div>
    </li>
  </ul>
</div>
</form>        

  <script>
    // monitor for changes in drop-down
    $(document).ready(function() { 
	    $('#choose-batch').on('change', function() { retrieveItem( $(this).val() ) });
	    $('#CaseCount, #BottleCount').on('change', function() { 
		    var bottles = 0;
		    var value1 = $('#CaseCount').val();
		    var value2 = $('#BottleCount').val();
		    var BottlesRemaining = (value1 * 12) + (value2 * 1);
		    $('#BottlesRemaining').val(BottlesRemaining);
		    });
    });
    // send batchNum via ajax
    function retrieveItem(BatchNumber) {
      $.post(
        "CDC_Ajax.php",               // where to send data
        {BatchNum: BatchNumber},  // parameters to send {varname: value}
        function(result) {        // what to do with results
          if(result.status=='success') {
            populateForm(result.data);
          } else {
            alert ('oops, failed');
          }
        }
      );
    }
	    
    // put results into page
    function populateForm(data) {
      $('#BatchNum').val(data.BatchNum);
      $('#BatchName').val(data.BatchName);
      $('#ClassType').val(data.ClassType);
      $('#BottleProof').val(data.BottleProof);
      $('#UPC').val(data.UPC);
    }
   
  </script>

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
