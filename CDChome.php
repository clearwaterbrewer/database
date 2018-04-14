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
<link type="text/css" rel="stylesheet" href="styles/form.css" />
<link type="text/css" rel="stylesheet" href="styles/nova.css" />
<link type="text/css" rel="stylesheet" href="styles/printForm.css" media="print" />
<link type="text/css" rel="stylesheet" href="styles/batches.css"/>
<style type="text/css">
    .form-label-left{
        width:150px;
    }
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px;
    }
    body, html{
        margin:0;
        padding:0;
        background:#fff;
    }
    .form-all{
        margin:0px auto;
        padding-top:0px;
        width:690px;
        color:#555 !important;
        font-family:"Lucida Grande", "Lucida Sans Unicode", "Lucida Sans", Verdana, sans-serif;
        font-size:14px;
    }
</style>

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
          <div style="margin-left:30px" class="form-buttons-wrapper">
            <a href="CDCbatches.php" >
              <button type="button" class="form-submit-button" >
                Batches
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <a href="CDCRecFermentables.php" >
              <button type="button" class="form-submit-button" >
                Receive Fermantables
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <a href="CDCFermantations.php" >
              <button type="button" class="form-submit-button" >
                Fermentations
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <a href="CDCWashRuns.php" >
              <button type="button" class="form-submit-button" >
                Wash Runs
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <a href="CDCSpiritRuns.php" >
              <button type="button" class="form-submit-button" >
                Spirit Runs
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <a href="CDCWashRuns.php" >
              <button type="button" class="form-submit-button" >
                Wash Runs
              </button>
            </a>
           </div>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
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
<p>
 <span class="error">You are not authorized to access this page.</span> Please <a href="index.php">login</a>.
</p>
<?php endif; ?>
</body>
</html>
