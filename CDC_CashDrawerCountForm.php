<?php
require_once('includes/psl-configPDO.php'); //db info
require_once('includes/functions.php'); //security functions
sec_session_start();
?>
<!DOCTYPE HTML>
<html class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Drawer Count Entry" >
<meta property="og:description" content="Please click the link to complete this form.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>CDC Drawer Count Entry</title>
<link type="text/css" rel="stylesheet" href="styles/main.css" />
</head>

<body>
<?php if (login_check($mysqli) == true) : ?>
<form class="jotform-form" accept-charset="utf-8" id="BatchForm" name="batchform" action="includes/CashDrawerCountInsert.php" method="post">
<div class="form-all">
  <ul class="form-section page-section">
    <li id="cid_1" class="form-input-wide" data-type="control_head">
      <div class="form-header-group ">
        <div class="header-text httal htvam">
          <h1>CDC Drawer Count Entry</h2>
          <label class="form-label form-label-top form-label-auto">Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
        </div>
      </div>
    </li>
    <li class="form-line" data-type="control_textbox">
       <div class="form-input-wide">
       <label for="DateTimeCode">DateTimeCode</label>
          <input type="text" class="form-control" name="DateTimeCode" value="<?php echo date('Y-m-d H:i:s'); ?>" required>
        <label for="CountOpen">Opening Count</label>
          <input type='text' inputmode="numeric" pattern="^\d{1,7}$" size="8"class='form-control' id="CountOpen" name="CountOpen" value="" />
       </div>
    </li>

    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="bill_100"> $100 bills</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="bill_100" name="bill_100" value="" >
        <label for="coin_100"> $1 coins</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="coin_100" name="coin_100" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="bill_50"> $50 bills</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="bill_50" name="bill_50" value="" >
        <label for="coin_25"> quarters</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="coin_25" name="coin_25" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="bill_20"> $20 bills</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="bill_20" name="bill_20" value="" >
        <label for="coin_10"> __dimes</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="coin_10" name="coin_10" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="bill_10"> $10 bills</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="bill_10" name="bill_10" value="" >
        <label for="coin_5"> _nickels</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="coin_5" name="coin_5" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="bill_5"> $5 bills_</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="bill_5" name="bill_5" value="" >
        <label for="coin_1"> pennies</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="coin_1" name="coin_1" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="bill_1"> $1 bills_</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="bill_1" name="bill_1" value="" >
        <label for="coins"> coins</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,3}$" size="4" class="form-control" id="coins" name="coins" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="CountClose"> Closing Count</label>
          <input type="text" inputmode="numeric" pattern="^\d{1,7}$" size="8" class="form-control" id="CountClose" name="CountClose" value="" >
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <div class="form-input-wide">
        <label for="POS_Amount"> POS_Amount </label>
          <input type="text" inputmode="numeric" pattern="^\d{1,7}$" size="8" class="form-control" id="POS_Amount" name="POS_Amount" value="" >
        <label for="POS_Tip"> POS_Tip </label>
          <input type="text" inputmode="numeric" pattern="^\d{1,7}$" size="8" class="form-control" id="POS_Tip" name="POS_Tip" value="" >
        <label for="POS_Due"> POS_Due </label>
          <input type="text" inputmode="numeric" pattern="^\d{1,7}$" size="8" class="form-control" id="POS_Due" name="POS_Due" value="" >
        </div>
    </li>
  </ul>
  <ul class="form-section page-section" >
    <li class="form-line" data-type="control_text" >
      <div class="buttonrow">
            <button type="submit" class="form-submit-button" id="submit_form" name="submit" value="Submit">Submit</button>
          <a href="CDC_CashDrawerCount.php"><button type="button" class="form-submit-button">Back to Drawer Counts</button></a>
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
