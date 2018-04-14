<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
?>
<!DOCTYPE HTML>
<html class="supernova"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Batches" >
<meta property="og:description" content="Please click the link to complete this form.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>Batches</title>
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
  <input type="hidden" name="formID" value="81033354119853" />
  <div class="form-all">
    <ul class="form-section page-section">
      <li id="cid_1" class="form-input-wide" data-type="control_head">
        <div class="form-header-group ">
          <div class="header-text httal htvam">
            <h2 id="header_1" class="form-header" data-component="header">
              Batches
             </h2>
              <label class="form-label form-label-top form-label-auto">Logged in as: <?php echo htmlentities($_SESSION['username']); ?> </label>
          </div>
        </div>
      </li>
      <li class="form-line" data-type="control_number" id="id_3">
        <label class="form-label form-label-top form-label-auto" id="label_3" for="input_3"> Batch Number </label>
        <div id="cid_3" class="form-input-wide">
          <input type="number" id="input_3" name="q3_batchNumber" data-type="input-number" class=" form-number-input form-textbox" style="width:60px" size="5" value="" placeholder="ex: 23" data-component="number" />
        </div>
      </li>
      <li class="form-line" data-type="control_textbox" id="id_4">
        <label class="form-label form-label-top form-label-auto" id="label_4" for="input_4"> Batch Name </label>
        <div id="cid_4" class="form-input-wide">
          <input type="text" id="input_4" name="q4_batchName" data-type="input-textbox" class="form-textbox" size="20" value="" data-component="textbox" />
        </div>
      </li>
      <li class="form-line" data-type="control_dropdown" id="id_5">
        <label class="form-label form-label-top form-label-auto" id="label_5" for="input_5"> Class </label>
        <div id="cid_5" class="form-input-wide">
          <select class="form-dropdown" id="input_5" name="q5_class" style="width:150px" data-component="dropdown">
            <option value="">  </option>
            <option value="Whisky 160 and under"> Whisky 160 and under </option>
            <option value="Rum"> Rum </option>
            <option value="Gin"> Gin </option>
            <option value="Vodka"> Vodka </option>
            <option value="Spirits 190"> Spirits 190 </option>
            <option value="Other"> Other </option>
          </select>
        </div>
      </li>
      <li class="form-line" data-type="control_textbox" id="id_6">
        <label class="form-label form-label-top form-label-auto" id="label_6" for="input_6"> Source Product </label>
        <div id="cid_6" class="form-input-wide">
          <input type="text" id="input_6" name="q6_sourceProduct" data-type="input-textbox" class="form-textbox" size="20" value="" data-component="textbox" />
        </div>
      </li>
      <li class="form-line" data-type="control_textbox" id="id_7">
        <label class="form-label form-label-top form-label-auto" id="label_7" for="input_7"> Source Ingredient </label>
        <div id="cid_7" class="form-input-wide">
          <input type="text" id="input_7" name="q7_sourceIngredient" data-type="input-textbox" class="form-textbox" size="20" value="" data-component="textbox" />
        </div>
      </li>
      <li class="form-line" data-type="control_button" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <button id="input_2" type="submit" class="form-submit-button" data-component="button">
              Submit
            </button>
        </div>
      </li>
      <li class="form-line" data-type="control_text" id="id_8">
        <div id="cid_8" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <a href="CDChome.php" >
              <button type="button" class="form-submit-button" >
                Home
              </button>
            </a>
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
