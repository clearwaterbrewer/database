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
	  <div class="column">Source Container 1</div>
	  <div class="column">Wine-Gal 1</div>
	  <div class="column">Proof 1</div>
	  <div class="column">WG Remaining</div>
	  <div class="column">PG Remaining</div>
	  <div class="column">Source Container 2</div>
	  <div class="column">Wine-Gal 2</div>
	  <div class="column">Proof 2</div>
	  <div class="column">Source Container 3</div>
	  <div class="column">Wine-Gal 3</div>
	  <div class="column">Proof 3</div>
	  <div class="column">Source Container 4</div>
	  <div class="column">Wine-Gal 4</div>
	  <div class="column">Proof 4</div>
	  <div class="column">Total Wine Gal 1</div>
	  <div class="column">Total Proof Gal</div>
	  <div class="column">Start Coll</div>
	  <div class="column">Stop Coll</div>
	  <div class="column">Fores Wine Gal</div>
	  <div class="column">Heads Wine Gal</div>
	  <div class="column">Heads proof</div>
	  <div class="column">Heads Container</div>
	  <div class="column">Hearts1 Wine Gal</div>
	  <div class="column">Hearts1 proof</div>
	  <div class="column">Hearts1 Container</div>
	  <div class="column">Hearts2 Wine Gal</div>
	  <div class="column">Hearts2 proof</div>
	  <div class="column">Hearts2 Container</div>
	  <div class="column">Hearts3 Wine Gal</div>
	  <div class="column">Hearts3 proof</div>
	  <div class="column">Hearts3 Container</div>
	  <div class="column">Hearts4 Wine Gal</div>
	  <div class="column">Hearts4 proof</div>
	  <div class="column">Hearts4 Container</div>
	  <div class="column">Hearts5 Wine Gal</div>
	  <div class="column">Hearts5 proof</div>
	  <div class="column">Hearts5 Container</div>
	  <div class="column">Hearts6 Wine Gal</div>
	  <div class="column">Hearts6 proof</div>
	  <div class="column">Hearts6 Container</div>
	  <div class="column">Hearts7 Wine Gal</div>
	  <div class="column">Hearts7 proof</div>
	  <div class="column">Hearts7 Container</div>
	  <div class="column">Hearts8 Wine Gal</div>
	  <div class="column">Hearts8 proof</div>
	  <div class="column">Hearts8 Container</div>
	  <div class="column">Hearts9 Wine Gal</div>
	  <div class="column">Hearts9 proof</div>
	  <div class="column">Hearts9 Container</div>
	  <div class="column">Tails Wine Gal</div>
	  <div class="column">Tails proof</div>
	  <div class="column">Tails Container</div>
	  <div class="column">TWG collected</div>
	  <div class="column">TPG collected</div>
	  <div class="column">Destination Product</div>
	  <div class="column">Notes</div>
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
			echo '<div class=column>'.$row['SC1'].'</div>';
			echo '<div class=column>'.$row['WG1'].'</div>';
			echo '<div class=column>'.$row['Proof1'].'</div>';
			echo '<div class=column>'.$row['PG1'].'</div>';
			echo '<div class=column>'.$row['WG_R1'].'</div>';
			echo '<div class=column>'.$row['PG_R1'].'</div>';
			echo '<div class=column>'.$row['SC2'].'</div>';
			echo '<div class=column>'.$row['WG2'].'</div>';
			echo '<div class=column>'.$row['Proof2'].'</div>';
			echo '<div class=column>'.$row['SC3'].'</div>';
			echo '<div class=column>'.$row['WG3'].'</div>';
			echo '<div class=column>'.$row['Proof3'].'</div>';
			echo '<div class=column>'.$row['SC4'].'</div>';
			echo '<div class=column>'.$row['WG4'].'</div>';
			echo '<div class=column>'.$row['Proof4'].'</div>';
			echo '<div class=column>'.$row['WG_D'].'</div>';
			echo '<div class=column>'.$row['PG_D'].'</div>';
			echo '<div class=column>'.$row['StartColl'].'</div>';
			echo '<div class=column>'.$row['StopColl'].'</div>';
			echo '<div class=column>'.$row['ForesWG'].'</div>';
			echo '<div class=column>'.$row['HeadsWG'].'</div>';
			echo '<div class=column>'.$row['HeadsProof'].'</div>';
			echo '<div class=column>'.$row['HeadsContainer'].'</div>';
			echo '<div class=column>'.$row['Hearts1WG'].'</div>';
			echo '<div class=column>'.$row['Hearts1Proof'].'</div>';
			echo '<div class=column>'.$row['Hearts1Container'].'</div>';
			echo '<div class=column>'.$row['Hearts2WG'].'</div>';
			echo '<div class=column>'.$row['Hearts2Proof'].'</div>';
			echo '<div class=column>'.$row['Hearts2Container'].'</div>';
			echo '<div class=column>'.$row['Hearts3WG'].'</div>';
			echo '<div class=column>'.$row['Hearts3Proof'].'</div>';
			echo '<div class=column>'.$row['Hearts3Container'].'</div>';
			echo '<div class=column>'.$row['Hearts4WG'].'</div>';
			echo '<div class=column>'.$row['Hearts4Proof'].'</div>';
			echo '<div class=column>'.$row['Hearts4Container'].'</div>';
			echo '<div class=column>'.$row['Hearts5WG'].'</div>';
			echo '<div class=column>'.$row['Hearts5Proof'].'</div>';
			echo '<div class=column>'.$row['Hearts5Container'].'</div>';
			echo '<div class=column>'.$row['Hearts6WG'].'</div>';
			echo '<div class=column>'.$row['Hearts6Proof'].'</div>';
			echo '<div class=column>'.$row['Hearts6Container'].'</div>';
			echo '<div class=column>'.$row['Hearts7WG'].'</div>';
			echo '<div class=column>'.$row['Hearts7Proof'].'</div>';
			echo '<div class=column>'.$row['Hearts7Container'].'</div>';
			echo '<div class=column>'.$row['Hearts8WG'].'</div>';
			echo '<div class=column>'.$row['Hearts8Proof'].'</div>';
			echo '<div class=column>'.$row['Hearts8Container'].'</div>';
			echo '<div class=column>'.$row['Hearts9WG'].'</div>';
			echo '<div class=column>'.$row['Hearts9Proof'].'</div>';
			echo '<div class=column>'.$row['Hearts9Container'].'</div>';
			echo '<div class=column>'.$row['TailsWG'].'</div>';
			echo '<div class=column>'.$row['TailsProof'].'</div>';
			echo '<div class=column>'.$row['TailsContainer'].'</div>';
			echo '<div class=column>'.$row['TWGCollected'].'</div>';
			echo '<div class=column>'.$row['TPGCollected'].'</div>';
			echo '<div class=column>'.$row['DestinationProduct'].'</div>';
			echo '<div class=column>'.$row['Notes'].'</div>';
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
	
