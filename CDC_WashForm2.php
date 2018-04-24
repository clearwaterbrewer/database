<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();

if(isset($_POST['search']))
{

    $makerValue = $_POST['BatchNum']; // BatchNum value

    $BatchNum = mysqli_real_escape_string($_POST['selected_text']); // get the selected text
    echo $BatchNum;
}


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

<li>
  
<label for="BatchNum"> BatchNum : </label>
<select id="batchnum" name="BatchNum" >
 <option value="">Select BatchNum</option>
  <?php 
    $sql= "SELECT * FROM Batches"; 
    $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) { 
  ?>
  <option value="<?php echo $row['BatchNum']; ?>"><?php echo $row['BatchName']; ?></option><?php } ?>
</select>
<input type="hidden" name="selected_text" id="selected_text" value="" />
<input type="submit" name="search" value="Search"/>
    
    
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
