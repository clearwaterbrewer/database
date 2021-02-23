<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html class="supernova">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Drawer Counts" >
<meta property="og:description" content="View recent counts.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>CDC Drawer Counts</title>
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
         <label style="font-weight:bold; font-size:28px;">CDC Drawer Counts</label>
        </div>
        <div>
          <label>Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
	</div>
        </div>
	<label><center><b>Last 30 Counts</b></center></label>
    </li
    <li>
      <div class="ex3">
	      <div class="headrow">
	        <div class="column">Date</div>
	        <div class="column">Time</div>
	        <div class="column">Initials</div>
	        <div class="column">Open</div>
	        <div class="column">100</div>
	        <div class="column">50</div>
	        <div class="column">20</div>
	        <div class="column">10</div>
	        <div class="column">5</div>
	        <div class="column">1</div>
	        <div class="column">Change</div>
	        <div class="column">Cash Out</div>
	        <div class="column">Close</div>
	        <div class="column">Diff</div>
	        <div class="column">Cash Sales</div>
	        <div class="column">Cash Tip</div>
	        <div class="column">Cash Total</div>
      	</div>
<?php 
$sql="SELECT * FROM DrawerCounts
	WHERE DateTimeCode between (CURDATE() - INTERVAL 2 MONTH ) and NOW() ORDER BY DateTimeCode DESC";
	      $result = $mysqli->query($sql);
	if ($result->num_rows > 0) {
		  while ($row = $result->fetch_assoc()) {
    			echo '<div class=row>';
			echo '<div class=column>'.DATE('Y m d', strtotime($row['DateTimeCode'])).'</div>';
                	echo '<div class=column>'.DATE('H:i:s', strtotime($row['DateTimeCode'])).'</div>';
 			echo '<div class=column>'.$row['Initials'].'</div>';
			echo '<div class=column>'.$row['CountOpen'].'</div>';
			echo '<div class=column>'.$row['bill_100'].'</div>';
			echo '<div class=column>'.$row['bill_50'].'</div>';
			echo '<div class=column>'.$row['bill_20'].'</div>';
			echo '<div class=column>'.$row['bill_10'].'</div>';
			echo '<div class=column>'.$row['bill_5'].'</div>';
			echo '<div class=column>'.$row['bill_1'].'</div>';
			echo '<div class=column>'.((($row['coin_100'] * 100) + ($row['coin_25'] * 25) + ($row['coin_10'] * 10) + ($row['coin_5'] * 5) + $row['coin_1'])/100).'</div>';
			echo '<div class=column>'.$row['CashOut'].'</div>';
			echo '<div class=column>'.$row['CountClose'].'</div>';
			echo '<div class=column>'.$row['CountDelta'].'</div>';
			echo '<div class=column>'.$row['POS_Amount'].'</div>';
			echo '<div class=column>'.$row['POS_Tip'].'</div>';
			echo '<div class=column>'.$row['POS_Due'].'</div>';
      			echo "</div>";
		  }
		}
?>
    </li>	
  </ul>
  <ul class="form-section page-section" >
    <li class="form-line" data-type="control_text" >
      <div class="buttonrow">
        <div class="col-1 form-buttons-wrapper">
          <a href="CDC_CashDrawerCountForm.php" >
            <button type="button" class="form-submit-button" >
              New Drawer Count
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
