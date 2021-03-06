<?php
require_once('includes/psl-configPDO.php'); //db info
require_once('includes/functions.php'); //security functions
$pdo = new PDO('mysql:host='.$servername.';dbname='.$dbname,$dbusern,$dbpassw);
$getBatchNum = $pdo->prepare("SELECT BatchNum, BatchName FROM Batches WHERE CurrentBatch=1 AND UPC <> '' ORDER by BatchNum DESC");
$getBatchNum->execute();
$getDestination = $pdo->prepare("SELECT DistributorsID, DistributorsName FROM Distributors");
$getDestination->execute();
sec_session_start();
?>

<!DOCTYPE HTML>
<html class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Remove From Bond Entry" >
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

	
<form class="jotform-form" accept-charset="utf-8" id="RFBForm" name="RFBForm" action="includes/RFBInsert.php" method="POST">
<div class="form-all">
  <ul class="form-section page-section">
    <li id="cid_1" class="form-input-wide" data-type="control_head">
      <div class="form-header-group ">
        <div class="header-text httal htvam">
          <h1>CDC Remove From Bond Entry</h2>
          <label class="form-label form-label-top form-label-auto">Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
        </div>
      </div>
    </li>
    <li class="form-line" data-type="control_textbox">
       <div class="form-input-wide">
       <label for="DateTimeCode">DateTimeCode</label>
          <input type="text" class="form-control" name="DateTimeCode" value="<?php echo date('Y-m-d H:i:s'); ?>" required>
        <label for="choose-batch">Choose a Batch</label>
	  <select class='form-dropdown' id='choose-batch' name="BatchNum">
          <?php while($row = $getBatchNum->fetchObject()): ?>
	  <option value="<?= $row->BatchNum ?>" ><?= $row->BatchNum." - ".$row->BatchName ?></option>
          <?php endwhile; ?>
          </select>
        <label for="BatchName">Batch Name</label>
          <input type='text' class='form-control' id="BatchName" name="BatchName" value="" />
       </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="ClassType">Class Type</label>
          <input type="text" class="form-control" id="ClassType" name="ClassType" value="" required >
        <label for="BottleProof">Proof</label>
          <input type="text" class="form-control" id="BottleProof" name="BottleProof" value="" required >
        <label for="UPC">UPC</label>
          <input type="text" class="form-control" id="UPC" name="UPC" value="" required >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="BottlesRemoved">Bottles Removed</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,8}$" size="8" class="form-control" id="BottlesRemoved" name="BottlesRemoved" value="" required >
        <label for="CaseCount">6 Case Count</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="CaseCount" name="CaseCount" value="" >
        <label for="BottleCount">Bottle Count</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="BottleCount" name="BottleCount" value="" >
        <label for="BottlesRemaining">Bottles Remaining</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,8}$" size="8" class="form-control" id="BottlesRemaining" name="BottlesRemaining" value="" required >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="CaseNumbers">CaseNumbers</label>
          <input type="text" inputmode="numeric" class="form-control" id="CaseNumbers" name="CaseNumbers" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_dropdown">
        <div class="form-input-wide">
        <label for="Destination">Destination</label>
		<select class='form-dropdown' id='Destination' name="Destination" >
          <?php while($row = $getDestination->fetchObject()): ?>
		<option value="<?= $row->DistributorsName ?>" ><?= $row->DistributorsName ?></option>
          <?php endwhile; ?>
          </select>
        <label for="InvoiceNumber">InvoiceNumber</label>
          <input type="text" class="form-control" id="InvoiceNumber" name="InvoiceNumber" value="" >
        </div>
        <div class="form-input-wide">
         <label> - </label>
	 <input type="hidden" id="Initials" name="Initials" value="<?php echo $_SESSION['initials']; ?>" >
	 <input type="submit" id="createPDF" name="createPDF" value="Create PDF" >
       </div>
    </li>
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
		    var BottlesRemaining = (value1 * 6) + (value2 * 1);
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
