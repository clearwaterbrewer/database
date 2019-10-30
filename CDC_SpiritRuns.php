<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html class="supernova">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Wash Runs" >
<meta property="og:description" content="View Wash Runs.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>CDC Spirit Runs</title>
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
         <label style="font-weight:bold; font-size:28px;">CDC Spirit Runs</label>
        </div>
        <div>
          <label >Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
        </div>
      </div>
	<label><center><b>Last 100 Spirit Runs</b></center></label>
    </li>
    <li>
      <div class="ex3">
	<div class="headrow">
	  <div class="column">Date</div>
	  <div class="column">Time</div>
	  <div class="column">Batch</div>
	  <div class="column">Source Amount</div>
	  <div class="column">Source Container</div>
	  <div class="column">Alc ByVol</div>
	  <div class="column">Gal Distilled</div>
	  <div class="column">Gal Remaining</div>
	  <div class="column">WG Collected</div>
	  <div class="column">Proof</div>
	  <div class="column">PG Collected</div>
	  <div class="column">Product</div>
	  <div class="column">Container</div>
	  <div class="column">WG Resulting</div>
	  <div class="column">PG Resulting</div>
	</div>
<?php 
      	  $sql="SELECT * FROM 
		 (SELECT * FROM SpiritRuns ORDER BY DateTimeCode DESC LIMIT 100) 
		  sub ORDER BY DateTimeCode DESC";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		  while ($row = $result->fetch_assoc()) {
    			echo '<div class=row>';
	   	   	echo '<div class=column>'.DATE('Y m d', strtotime($row['DateTimeCode'])).'</div>';
			echo '<div class=column>'.DATE('H:i:s', strtotime($row['DateTimeCode'])).'</div>';
			echo '<div class=column>'.$row['BatchNum'].'</div>';
			echo '<div class=column>'.$row['SourceAmount'].'</div>';
			echo '<div class=column>'.$row['SourceContainer'].'</div>';
			echo '<div class=column>'.$row['AlcByVol'].'</div>';
			echo '<div class=column>'.$row['GallonsDistilled'].'</div>';
			echo '<div class=column>'.$row['GallonsRemaining'].'</div>';
			echo '<div class=column>'.$row['WGCollected'].'</div>';
			echo '<div class=column>'.$row['ProofCollected'].'</div>';
			echo '<div class=column>'.$row['PGCollected'].'</div>';
			echo '<div class=column>'.$row['DestinationProduct'].'</div>';
			echo '<div class=column>'.$row['DestinationContainer'].'</div>';
			echo '<div class=column>'.$row['WG_resulting'].'</div>';
			echo '<div class=column>'.$row['PG_resulting'].'</div>';
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
        <div class="col-1 form-buttons-wrapper">
          <a href="CDC_SpiritRunForm.php" >
            <button type="button" class="form-submit-button" >
              New Spirit Run
            </button>
          </a>
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
	
