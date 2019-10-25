<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE html>
<html class="supernova">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Ingredients" >
<meta property="og:description" content="View Ingredients.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>CDC Ingredients</title>
<link type="text/css" rel="stylesheet" href="styles/main.css"/>
<style type="text/css" id="form-designer-style">
.form-label.form-label-auto { display: block; float: none; text-align: left; width: inherit; } 
</style>
<style>
div.ex3 {
    overflow: auto;
    max-height: 40vh;
	}
</style>
</head>
<body>
<form class="jotform-form" accept-charset="utf-8">
<div class="form-all">
  <ul class="form-section page-section">        
    <li id="cid_1" class="form-input-wide" data-type="control_head">
      <div class="form-header-group ">
         <div class="header-text httal htvam">
         <label style="font-weight:bold; font-size:28px;">CDC Batches</label>
        </div>
        <div>
          <label>Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
	</div>
        </div>
	<label><center><b>Ingredients</b></center></label>
    </li
     <li>
      <div class="ex3">
	      <div class="row">
	        <div class="column">Name</div>
	        <div class="column">Description</div>
	        <div class="column">Value3</div>
      	</div>
        <?php 
      	  $sql="SELECT * FROM 
		 (SELECT * FROM Ingredients ORDER BY IngredientName DESC LIMIT 100) 
		  sub ORDER BY IngredientName ASC";
		$result = $mysqli->query($sql);
		if ($result->num_rows > 0) {
		  while ($row = $result->fetch_assoc()) {
    			echo '<div class=row>';
			echo '<div class=column>'.$row['IngredientName'].'</div>';
			echo '<div class=column>'.$row['IngredientDescription'].'</div>';
			echo '<div class=column>'.$row['IngredientValue3'].'</div>';
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
          <a href="CDC_BatchForm.php" >
            <button type="button" class="form-submit-button" >
              New Batch
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
