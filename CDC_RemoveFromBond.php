<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html class="supernova">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Removals from Bond" >
<meta property="og:description" content="View Removals from Bond.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>CDC Wash Runs</title>
<link type="text/css" rel="stylesheet" href="styles/main.css"/>
<style type="text/css" id="form-designer-style">
.form-label.form-label-auto { display: block; float: none; text-align: left; width: inherit; } 
</style>
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
<form class="jotform-form" accept-charset="utf-8">
<div class="form-all">
  <ul class="form-section page-section">        
    <li id="cid_1" class="form-input-wide" data-type="control_head">
      <div class="form-header-group ">
        <div class="header-text httal htvam">
         <label style="font-weight:bold; font-size:28px;">CDC Removals from Bond</label>
        </div>
        <div>
          <label >Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
        </div>
      </div>
	<label><center><b>Last 60 Days Removals from Bond</b></center></label>
    </li>
    <li>
      <div class="ex3">
	<div class="headrow">
	  <div class="column">Date</div>
	  <div class="column">Time</div>
	  <div class="column">Batch</div>
	  <div class="column">Product</div>
	  <div class="column">Class/Type</div>
	  <div class="column">Proof</div>
	  <div class="column">Bottles Removed</div>
	  <div class="column">Bottles Remain</div>
	  <div class="column">Case Numbers</div>
	  <div class="column">Destination</div>
	  <div class="column">Invoice</div>
	  <div class="column">Initials</div>
	</div>
<?php 
$sql="SELECT * FROM RemovedFromBond INNER JOIN Batches ON RemovedFromBond.BatchNum=Batches.BatchNum
	WHERE DateTimeCode between (CURDATE() - INTERVAL 2 MONTH ) and NOW() ORDER BY DateTimeCode DESC";
	      $result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
	  while ($row = $result->fetch_assoc()) {
		echo '<div class=row>';
		echo '<div class=column>'.DATE('Y m d', strtotime($row['DateTimeCode'])).'</div>';
		echo '<div class=column>'.DATE('H:i:s', strtotime($row['DateTimeCode'])).'</div>';
		echo '<div class=column>'.$row['BatchNum'].'</div>';
		echo '<div class=column>'.$row['BatchName'].'</div>';
		echo '<div class=column>'.$row['ClassType'].'</div>';
		echo '<div class=column>'.$row['BottleProof'].'</div>';
		echo '<div class=column>'.$row['BottlesRemoved'].'</div>';
		echo '<div class=column>'.$row['BottlesRemaining'].'</div>';
		echo '<div class=column>'.$row['CaseNumbers'].'</div>';
		echo '<div class=column>'.$row['Destination'].'</div>';
		echo '<div class=column>'.$row['InvoiceNumber'].'</div>';
		echo '<div class=column>'.$row['Initials'].'</div>';
		echo "</div>";
	  }
		}
?>
       </div>
    </li>	
  </ul>
<ul class="form-section page-section" >
    <li class="form-line" data-type="control_text">
      <div class="buttonrow">
	<a href="CDC_RFBForm.php" ><button type="button" class="form-submit-button" >New Removal From Bond</button></a>
	<a href="CDChome.php" ><button type="button" class="form-submit-button" >Home</button></a>
	<a href="SaveRFBcsv.php" ><button type="button" class="form-submit-button" >Save CSV</button></a>
	<a href="includes/logout.php"><button type="button" class="form-submit-button" >Logout</button></a>
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
