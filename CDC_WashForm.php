<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE HTML>
<html class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Wash Run Entry" >
<meta property="og:description" content="Please click submit to complete this form.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>CDC Wash Run Entry</title>
<link type="text/css" rel="stylesheet" href="styles/main.css" />
<head>
  <script>
  function showBatch(str) {
    if (str == "") {
        document.getElementById("txtMessage").innerHTML = "";
        return;
    } 
    else { 
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtMessage").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","CDCAjax2.php?b="+str,true);
        xmlhttp.send();
    }
}
  </script>
</head>
<body>
<?php if (login_check($mysqli) == true) : ?>
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
        <label class="form-label form-label-top form-label-auto" for="BatchNum">BatchNum</label>
        <div class="form-input-wide">

          
          <?php
          $sql = "SELECT * FROM Batches ORDER by BatchNum DESC";
          $result = $mysqli->query($sql);
          echo "<select class='form-dropdown' required name='BatchNum' onchange='showBatch(this.value)>";
          echo "<option value=''> Select BatchNum        </option>";
          while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['BatchNum'] .  "'>" . $row['BatchNum'] .' - '. $row['BatchName'] . "</option>";
          }
          echo "</select>";
         ?>
 
       </div>
    </li>
    <li class='form-line' data-type='control_textbox'>
        <label class='form-label form-label-top form-label-auto' for='BatchName'>Batch Name</label>
        <div class='form-input-wide'>
          
          
          <input type="text" class="form-control" size="20" name="BatchName"  >
   
      
      </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" for="SourceProduct">Source Product</label>
        <div class="form-input-wide">
          <input type="text" class="form-control" size="20" name="SourceProduct" value="" required>
        </div>
    </li>
    <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" for="SourceIngredient">Source Ingredient</label>
        <div class="form-input-wide">
          <input type="text" class="form-control" size="20" name="SourceIngredient" value="" required>
        </div>
    </li>
  </ul>
    <ul class="form-section page-section" >
    <li class="form-line" data-type="control_text" >
      <div class="buttonrow">
        <div class="col-1 form-buttons-wrapper">
            <button type="submit" class="form-submit-button" name="submit" value="Submit" id="submit_form">Submit</button>
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
