<?php
require_once('includes/psl-configPDO.php'); //db info
require_once('includes/functions.php'); //security functions
$getBatchNum = $pdo->prepare("SELECT BatchNum, BatchName FROM Batches ORDER by BatchNum DESC");
$getBatchNum->execute();
$getSourceContainer = $pdo->prepare("SELECT id, ContainerName FROM Containers ORDER by ContainerName");
$getSourceContainer->execute();
$getDestinationContainer = $pdo->prepare("SELECT id, ContainerName FROM Containers ORDER by ContainerName");
$getDestinationContainer->execute();
$getDestinationProduct = $pdo->prepare("SELECT id, ProductName FROM Products ORDER by id");
$getDestinationProduct->execute();
sec_session_start();
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

<?php if (login_check($mysqli) == true) : ?>

	
<form class="jotform-form" accept-charset="utf-8" id="WashForm" name="washform" action="includes/WashRunInsert.php" method="POST">
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
       <div class="form-input-wide">
       <label for="DateTimeCode">DateTimeCode</label>
          <input type="text" class="form-control" name="DateTimeCode" value="<?php echo date('Y-m-d H:i:s'); ?>" required>
        <label for="choose-batch">Choose a Batch</label>
	  <select class='form-dropdown' id='choose-batch'>
          <?php while($row = $getBatchNum->fetchObject()): ?>
	  <option value="<?= $row->BatchNum ?>" ><?= $row->BatchNum." - ".$row->BatchName ?></option>
          <?php endwhile; ?>
          </select>
        <label for="BatchName">Batch Name</label>
          <input type='text' class='form-control' id="BatchName" name="BatchName" value="<?php echo $row['BatchName'];?>" />
       </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="SourceProduct">Source Product</label>
          <input type="text" class="form-control" id="SourceProduct" name="SourceProduct" value="" required>
        <label for="SourceIngredient">Source Ingredient</label>
          <input type="text" class="form-control" id="SourceIngredient" name="SourceIngredient" value="" required>
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="WashName">Wash Name</label>
          <input type="text" class="form-control" id="WashName" name="WashName" value="">
        <label for="SourceAmount">Source Amount</label>
          <input type="text" class="form-control" id="SourceAmount" name="SourceAmount" value="">
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="SourceContainer">Source Container</label>
	  <select class='form-dropdown' id='SourceContainer' name="SourceContainer" >
          <?php while($row = $getSourceContainer->fetchObject()): ?>
		<option value="<?= $row->id ?>" ><?= $row->id." - ".$row->ContainerName ?></option>
          <?php endwhile; ?>
          </select>
        <label for="AlcByVol">AlcByVol</label>
          <input type="text" class="form-control" id="AlcByVol" name="AlcByVol" value="">
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="GallonsDistilled">Gallons Distilled</label>
          <input type="text" inputmode="numeric" pattern="^\d{0,4}(\.\d{0,1})?$" size="6" class="form-control" id="GallonsDistilled" name="GallonsDistilled" value="">
        <label for="GallonsRemaining">Gallons Remaining</label>
          <input type="text" inputmode="numeric" pattern="^\d{0,4}(\.\d{0,1})?$" size="6" class="form-control" id="GallonsRemaining" name="GallonsRemaining" value="">
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
         <label for="StartColl">Collection Start Time</label>
          <input type="text" inputmode="numeric" pattern="(\d{2}:\d{2})" size="5" class="form-control" id="StartColl" name="StartColl" value="" >
         <label for="StopColl">Collection Stop Time</label>
          <input type="text" inputmode="numeric" pattern="(\d{2}:\d{2})" size="5" class="form-control" id="StopColl" name="StopColl" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="WGCollected">WG Collected</label>
          <input type="text" class="form-control" id="WGCollected" name="WGCollected" value="" >
        <label for="ProofCollected">Proof Collected</label>
          <input type="text" class="form-control" id="ProofCollected" name="ProofCollected" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="PGCollected">PG Collected</label>
          <input type="text" class="form-control" id="PGCollected" name="PGCollected" value="" readonly>
        <label  for="PGEfficiency">PG Efficiency</label>
          <input type="text" class="form-control" id="PGEfficiency" name="PGEfficiency" value="" readonly>
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="Temp_C">Temp_C</label>
          <input type="text" class="form-control" size="10" id="Temp_C" name="Temp_C" value="" >
        <label for="Distilled_pH">Distilled pH</label>
          <input type="text" class="form-control" size="7" id="Distilled_pH" name="Distilled_pH" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="StartProof">Start Proof</label>
          <input type="text" class="form-control" id="StartProof" name="StartProof" value="" >
        <label for="StopProof">Stop Proof</label>
          <input type="text" class="form-control" id="StopProof" name="StopProof" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_dropdown">
        <div class="form-input-wide">
        <label for="DestinationProduct">Destination Product</label>
		<select class='form-dropdown' id='DestinationProduct' name="DestinationProduct" >
          <?php while($row = $getDestinationProduct->fetchObject()): ?>
		<option value="<?= $row->id ?>" ><?= $row->id." - ".$row->ProductName ?></option>
          <?php endwhile; ?>
          </select>
        <label for="DestinationContainer">Destination Container</label>
		<select class='form-dropdown' id='DestinationContainer' name="DestinationContainer" >
          <?php while($row = $getDestinationContainer->fetchObject()): ?>
		<option value="<?= $row->id ?>" ><?= $row->id." - ".$row->ContainerName ?></option>
          <?php endwhile; ?>
          </select>
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="WG_existing">WG existing</label>
          <input type="text" class="form-control" id="WG_existing" name="WG_existing" value="" >
        <label for="WG_resulting">WG Resulting</label>
          <input type="text" class="form-control" id="WG_resulting" name="WG_resulting" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="PG_existing">PG Existing</label>
          <input type="text" class="form-control" id="PG_existing" name="PG_existing" value="" >
        <label for="PG_resulting">PG Resulting</label>
          <input type="text" class="form-control" id="PG_resulting" name="PG_resulting" value="" >
        </div>
    </li>
  </ul>
  <ul class="form-section page-section" >
    <li class="form-line" data-type="control_text" >
      <div class="buttonrow">
            <button type="submit" class="form-submit-button" id="submit_form" name="submit" value="Submit">Submit</button>
          <a href="CDC_WashRuns.php"><button type="button" class="form-submit-button">Back to Wash Runs</button></a>
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

      $('#choose-batch').on('change', function() {
        retrieveItem( $(this).val() );
      })
    });

    // monitor for changes in ProofCollected
    $(document).ready(function() {  

      $('#ProofCollected').on('focusout', function() {
        calculatePG();
      })
    });

	  
    var StartColl = $("#StartColl");
    var StopColl = $("#StopColl");
    function formatTime(e) {
      var r = /([a-f0-9]{2})([a-f0-9]{2})/i,
          str = e.target.value.replace(/[^a-f0-9]/ig, "");
      while (r.test(str)) {
        str = str.replace(r, '$1' + ':' + '$2');
      }

      e.target.value = str.slice(0, 5);
    };
	  
    // monitor for changes in StartColl and StopColl
    StartColl.on("keyup", formatTime);
    StopColl.on("keyup", formatTime);




    // send batchNum via ajax
    function retrieveItem(BatchNumber) {
      $.post(
        "CDC_Ajax_PDO.php",               // where to send data
        {BatchNum: BatchNumber},  // parameters to send {varname: value}
        function(result) {        // what to do with results
          if(result.status=='success') {
            populateForm(result.data);
          } else {
            alert ('oops, failed to retrieve batchinfo');
          }
        }
      );
    }

    function calculatePG() {
      var WGCollected = parseInt(document.getElementById('WGCollected').value);
      var ProofCollected = parseInt(document.getElementById('ProofCollected').value);
      var PGCollected = floatval(WGCollected) * floatval(ProofCollected) /100;
      var PGCollected = num_format(PGCollected, 2);
      document.getElementById('PGCollected').value = PGCollected;
    }
  

    // put results into page
    function populateForm(data) {
      $('#BatchName').val(data.BatchName);
      $('#SourceProduct').val(data.SourceProduct);
      $('#SourceIngredient').val(data.SourceIngredient);
    }
    function populatePG(data) {
      $('#PGCollected').val(data.PGCollected);
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
