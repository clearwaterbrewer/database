<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
sec_session_start();
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html class="supernova">    <head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:title" content="Secure Login: Log In" >
<meta property="og:description" content="Please log in to continue.">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta name="HandheldFriendly" content="true" />
<title>Secure Login: Log In</title>
<link type="text/css" rel="stylesheet" href="styles/main.css"/>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
<style type="text/css" id="form-designer-style">
    /* Injected CSS Code */
.form-label.form-label-auto { display: block; float: none; text-align: left; width: inherit; } /*__INSPECT_SEPERATOR__*/
    /* Injected CSS Code */
</style>
</head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form class="jotform-form" accept-charset="utf-8" action="includes/process_login.php" method="post" name="login_form"> 			
   <div class="form-all">
    <ul class="form-section page-section">
      <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" > Username </label>
        <div class="form-input-wide">
          <input type="text" name="username" class="input-textbox" size="20" value="" data-component="input-textbox" />
        </div>
      </li>
     <li class="form-line" data-type="control_textbox">
        <label class="form-label form-label-top form-label-auto" > Password </label>
        <div class="form-input-wide">
          <input type="password" id="password" name="password" data-type="input-textbox" class="form-textbox" size="20" value="" data-component="textbox" />
        </div>
      </li>
     <li class="form-line" data-type="control_button" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="margin-left:156px" class="form-buttons-wrapper">
            <input type="button" value="Login" onclick="formhash(this.form, this.form.password);" />
        </div>
</div>
        </form>
    </body>
</html>
