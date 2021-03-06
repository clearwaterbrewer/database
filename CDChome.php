<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE HTML>
<html class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="CDC Database Home Page" >
<meta property="og:description" content="Please choose a selection.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>CDC Database Home Page</title>
<link type="text/css" rel="stylesheet" href="styles/main.css"/>

    <style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
.form-label.form-label-auto { display: block; float: none; text-align: left; width: inherit; } /*__INSPECT_SEPERATOR__*/
    /* Injected CSS Code */
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
            <h2 id="header_1" class="form-header" data-component="header">
              CDC Database Home Page
             </h2>
              <label class="form-label form-label-top form-label-auto">Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
          </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_CashDrawerCount.php" >
              <button type="button" class="form-submit-button" >
                Cash Drawer Counts
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_Batches.php" >
              <button type="button" class="form-submit-button" >
                Batches
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_RecFermentables.php" >
              <button type="button" class="form-submit-button" >
                Receive Fermantables
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_Fermantations.php" >
              <button type="button" class="form-submit-button" >
                Fermentations
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_WashRuns.php" >
              <button type="button" class="form-submit-button" >
                Wash Runs
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_SpiritRuns.php" >
              <button type="button" class="form-submit-button" >
                Spirit Runs
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_BotanicalRuns.php" >
              <button type="button" class="form-submit-button" >
                Botanical Runs
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_Gauging.php" >
              <button type="button" class="form-submit-button" >
                Production Gauging
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_Barreling.php" >
              <button type="button" class="form-submit-button" >
                Barreling
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_unBarreling.php" >
              <button type="button" class="form-submit-button" >
                Un-Barreling
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_Bottling.php" >
              <button type="button" class="form-submit-button" >
                Bottling
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_RemoveFromBond.php" >
              <button type="button" class="form-submit-button" >
                Removed From Bond
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_Ingredients.php" >
              <button type="button" class="form-submit-button" >
                Ingredients
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
            <a href="CDC_Products.php" >
              <button type="button" class="form-submit-button" >
                Products
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div class="form-buttons-wrapper">
           <a href="includes/logout.php">
              <button type="button" class="form-submit-button" >
                Logout
              </button>
            </a>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
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
